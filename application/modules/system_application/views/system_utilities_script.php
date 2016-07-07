<script>
    /**
     * Shows error in the form submitted
     * @param {DOM} elementSelected the form that has been submitted
     * @param {type} errorList list of error from the api
     * @returns {undefined}
     */
    function show_form_error(elementSelected, errorList) {
        elementSelected.find(".formMessage").empty();
        elementSelected.find(".formMessage").show();
        errorList.forEach(function (errorValue) {
            if (errorValue["status"] > 100 && errorValue["status"] < 1000) {/*Form Validation Error*/
                for (var index in errorValue["message"]) {
                    elementSelected.find(".formMessage").append("* " + errorValue["message"][index] + "<br>");
                }
            } else if (errorValue["status"] > 1000 && errorValue["status"] < 10000) {/*System Error*/
                for (var x = 0; x < errorValue["message"].length; x++) {
                    for (var index in errorValue["message"][x]) {
                        elementSelected.find(".formMessage").append("* " + errorValue["message"][x][index] + "<br>");
                    }
                }
            } else {
                elementSelected.find(".formMessage").append("* " + errorValue["message"] + "<br>");
            }
        });
        elementSelected.scrollTo(".formMessage");
    }
    function clear_form_error(elementSelected) {
        elementSelected.find(".formMessage").empty();
        elementSelected.find(".formMessage").hide();
        elementSelected.find(".has-error").removeClass(".has-error");
    }
    /**
     * Show a system message at the bottom of the interface
     *
     * @param {int} status status of the message to avoid conflict
     * @param {int} messageType warning|danger|success|info
     * @param {object} messageDetail the message to be displayed
     * @param {object} link object containing the text and href of the link
     * @returns {undefined}
     */
    function show_system_message(status, messageType, messageDetail, link) {
        var messagePrototype = $("#systemComponent").find(".systemMessage").clone();
        messagePrototype.find(".alert-message").text(messageDetail);
        messagePrototype.attr("message_status", status);
        if (typeof link !== "undefined") {
            messagePrototype.find(".alert-link").text(link["text"]);
            if (typeof link["href"] !== "undefined") {
                messagePrototype.find(".alert-link").attr("href", link["href"]);
            } else if (typeof link["callback"] !== "undefined") {
                messagePrototype.find(".alert-link").click(link["callback"]);
            }

        }
        switch (messageType) {
            case 1: /*warning*/
                messagePrototype.addClass("alert-warning");
                messagePrototype.find(".alert-title").text("Warning!");
                break;
            case 2: /*danger*/
                messagePrototype.addClass("alert-danger");
                messagePrototype.find(".alert-title").text("Alert!");
                break;
            case 3: /*success*/
                messagePrototype.addClass("alert-success");
                messagePrototype.find(".alert-title").text("Success!");
                break;
            case 4: /*info*/
                messagePrototype.addClass("alert-info");
                messagePrototype.find(".alert-title").text("Information!");
                break;
        }

        $("#systemMessageContainer").prepend(messagePrototype);
        messagePrototype.fadeIn();
    }
    /***
     * Remove the message with matching status
     * @param {type} status 
     * @returns {undefined}
     */
    function remove_system_message(status) {
        $("#systemMessageContainer").find(".systemMessage[message_status='" + status + "']").remove();
    }
    
    
    /***
     * Add leading zero to a number
     * @param {type} num The number to be padded
     * @param {type} size Number of leading zeros
     * @returns {String}
     */
    function pad(num, size) {
        var s = "000000000" + num;
        return s.substr(s.length - size);
    }
</script>
