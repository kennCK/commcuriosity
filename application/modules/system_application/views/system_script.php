<script>
    var system_data = {
        account_information : {
            user_ID : "<?=user_id()?>"*1,
            first_name : "<?=user_first_name()?>",
            middle_name : "<?=user_middle_name()?>",
            last_name : "<?=user_last_name()?>",
            username : "<?=username()?>",
            user_type : "<?=user_type()?>"*1
        },
        url : {
            base_url : "<?=base_url()?>",
            api_url : "<?=api_url()?>",
            asset_url : "<?=asset_url()?>"
        },
        default : {
            module_controller : "<?=$default["module"]?>"
        },
        access_control_list :{},
        refresh_call : {

        }
    };
    function user_id(){
        return system_data.account_information.user_ID;
    }
    function user_type(){
        return system_data.account_information.user_type;
    }
    function user_first_name(){
        return system_data.account_information.first_name;
    }
    function user_middle_name(){
        return system_data.account_information.middle_name;
    }
    function user_last_name(){
        return system_data.account_information.last_name;
    }
    function base_url(link){
       return system_data.url.base_url+((typeof link === "undefined") ? "" : link);
    }
    function api_url(link){
       return system_data.url.api_url+link;
    }
    function asset_url(link){
       return system_data.url.asset_url+link;
    }
    function retrieve_access_control(){
        $.post(api_url("C_access_control_list/retrieveAccessControlList"), {}, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                if(response["data"]["access_control_list"]){
                    for(var x = 0; x < response["data"]["access_control_list"].length; x++){
                        system_data.access_control_list[response["data"]["access_control_list"][x]["module_ID"]] = (response["data"]["access_control_list"][x]);
                    }
                }
                if(response["data"]["group_access_control_list"]){
                    for(var x = 0; x < response["data"]["group_access_control_list"].length; x++){
                        system_data.access_control_list[response["data"]["group_access_control_list"][x]["module_ID"]] = (response["data"]["group_access_control_list"][x]);
                    }
                }
            }
            formSideBar();
        });
    }
    function refresh_session(){
        $.post(base_url("portal/refreshSession"), {}, function(data){
            var response = JSON.parse(data);
            if(!response["error"].length){
                system_data.account_information.user_ID = response["data"]["ID"];
                system_data.account_information.first_name = response["data"]["first_name"];
                system_data.account_information.middle_name = response["data"]["middle_name"];
                system_data.account_information.last_name = response["data"]["last_name"];
                system_data.account_information.username = response["data"]["username"];
                system_data.account_information.user_type = response["data"]["user_type"];
                system_data.account_information.account_type = response["data"]["account_type_ID"];
                
                $("#headerUserFullName").text(user_first_name()+" "+user_last_name());
                $("#headerUserImg").initial({name:((user_first_name()+"").charAt(0)+(user_last_name()+"").charAt(0)).toUpperCase()});
                
                $("#headerUserImg").height("30px");
                $("#headerUserImg").width("30px");
            }else{
                window.location = base_url();
            }
        });
    }
    function formSideBar(){
        $(".moduleNavigation").each(function(e){
            if(typeof system_data.access_control_list[$(this).attr("module_id")] !== "undefined"){
                $(this).show();
            }else{
                $(this).hide();
            }
        });
    }
    
</script>
<!--Modularization-->
<script>
    /***
     * Load module to the page
     * @param {String} moduleLink Controller/Function of the module
     * @param {String} moduleName Name of the module
     * @returns {undefined}
     */
    function load_module(moduleLink, moduleName){
        moduleName = moduleName.toLowerCase();
        moduleLink = moduleLink.toLowerCase();
        if($("#moduleContainer").find(".moduleHolder[module_link='"+moduleLink+"']").length === 0){
            $.post(base_url(moduleLink), {load_module : true}, function(data){
                /*CHECK IF JSON OR HTML FOR AUTHORIZATION*/
                var moduleHolder = $("#systemComponent").find(".moduleHolder").clone();
                moduleHolder.attr("module_link", moduleLink);
                moduleHolder.attr("id",moduleName.replace(/_([a-z])/g, function (g) { return g[1].toUpperCase(); }));
                moduleHolder.append(data);
                $("#moduleContainer").append(moduleHolder);
                /*show page*/
                $("#moduleContainer").find(".moduleHolder[module_link!='"+moduleLink+"']").hide();
                if($('.moduleHolder[module_link="'+moduleLink+'"]').is(":visible") === false){
                    $('.moduleHolder[module_link="'+moduleLink+'"]').fadeIn(500);
                    refresh_call(moduleName);
                }

            });
        }else{
            /*show page*/
            $("#moduleContainer").find(".moduleHolder[module_link!='"+moduleLink+"']").hide();
            if($('.moduleHolder[module_link="'+moduleLink+'"]').is(":visible") === false){
                $('.moduleHolder[module_link="'+moduleLink+'"]').fadeIn(500);
                refresh_call(moduleName);
            }
        }
    }
    /***
     * Call the refresh function of the module
     * @param {String} moduleName Name of the module to be refreshed
     * @returns {undefined}
     */
    function refresh_call(moduleName){
        if(typeof system_data.refresh_call[moduleName] !== "undefined"){
            for(var x = 0; x < system_data.refresh_call[moduleName].length; x++){
                system_data.refresh_call[moduleName][x]();
            }
        }
    }
    /**
     * Add functions that needs to be called everytime the module is viewed
     * @param {string} moduleName name of the module in underscore format
     * @param {type} refreshFunction function to be called
     * @returns {undefined}
     */
    function add_refresh_call(moduleName, refreshFunction){
        if(typeof system_data.refresh_call[moduleName] === "undefined"){
            system_data.refresh_call[moduleName] = [];
        }
        if($(".wl-active-page").attr("module_name") === moduleName){
            refreshFunction();
        }
        system_data.refresh_call[moduleName].push(refreshFunction);
    }
</script>
<!--Component-->
<script>
    /**
     * Load a Page Component to the Document.
     * @param {string} component The name of the component to be loaded
     * @param {function} callBack The function called after the component is loaded. This is where the purpose of loading a component being place
     * @returns {none}
     */
    function load_page_component(component, callBack){
        if($("."+component).length === 0 ){
            $.post("<?=base_url()?>system_application/loadPageComponent", {component : component}, function(data){
                $("#pageComponentContainer").append(data);
                callBack();
            });
        }else{
            callBack();
        }
    }
    /***
     * Send an API request. This is to be use instead for $.post for trapping different cases
     * @param {String} link the controller and function of the api
     * @param {type} callbackFn Callback function if the request is successful
     * @returns {undefined}
     */
    function api_request(link, callbackFn){
        $.post(api_url(link), function(data){
            var response = JSON.parse(data);
            callbackFn(response);
        });
    }
    /*** Functions for requesting***/
    /***
     * Load an asset
     * @param {String} link The link of the asset to be loaded
     * @returns {Boolean}
     */
    function load_asset(link) {
        if (link.indexOf(".css") > -1) {
            if (!$("link[href='" + asset_url("css/" + link) + "']").length) {
                var systemComponent = $("#systemComponent").find("link").clone();
                systemComponent.attr("href", asset_url("css/" + link));
                $("head").append(systemComponent);
                return true;
            } else {
                return false;
            }
        } else {
            if (!$("script[src='" + asset_url("js/" + link) + "']").length) {
                var systemComponent = $("#systemComponent").find("script").clone();
                systemComponent.attr("src", asset_url("js/" + link));
                $("head").append(systemComponent);
                return true;
            } else {
                return false;
            }
        }
    }
</script>

<!--Document Ready-->
<script>
    $(document).ready(function(){
        //redirect www
        if(window.location.href.indexOf("www") === 0){
            window.history.pushState('Object', 'Title', window.location.href.replace("www."));
        }
        load_module(system_data.default.module_controller, "Test Page");
        retrieve_access_control();
    });
</script>
