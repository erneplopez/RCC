
var brandShipOptionsMap={
    R:["Adventure of the Seas","Allure of the Seas","Anthem of the Seas"],
    Z:["Azamara Journey","Azamara Quest","Azamara Pursuit"],
    C:["Celebrity Eclipse","Celebrity Edge","Celebrity Equinox"]
}

var Model={
    personalIdentification:"",
    firstName:"",
    lastName:"",
    email:"",
    includeEmailList:"",
    brand:"",
    ship:"",
    sailDate:"",
    comments:"",
}


var ViewModel={
    getAllModelFields:function(){
        Model.personalIdentification=$("#personalIdentification").val();
        Model.firstName=$("#firstName").val();
        Model.lastName=$("#lastName").val();
        Model.email=$("#email").val();
        Model.includeEmailList=$("#includeEmailList").val();
        Model.brand=$("input[name='brand']:checked").val();
        Model.ship=$("#ship").val();
        Model.sailDate=$("#sailDate").val();
        Model.comments=$("#comments").val();
    },
    setIncludeEmailListCheckboxValue:function(){
        if($("#includeEmailList").is(':checked')){
            $("#includeEmailList").val("1")
        }
        else{
            $("#includeEmailList").val("0")
        }
    },
    setShipOptions:function(){
        var selectedBrand=$("input[name='brand']:checked").val();
        var shipOptions=brandShipOptionsMap[selectedBrand];
        View.renderShipOptions(shipOptions);
    },
    checkIfBrandSelected:function(){
        if(!$("input[name='brand']").is(':checked')){
            View.renderErrorMessage(["You need to select a brand first"])
        }
    },
    hideSubmitMessageField:function(){
        setTimeout(function(){ $("#submitErrorMessage").fadeOut(); }, 10000);
        setTimeout(function(){ $("#submitSuccessMessage").fadeOut(); }, 10000);
    },
    validateInput:function() {
        var errorMessages=[];
        ViewModel.getAllModelFields();
        Array.prototype.push.apply(errorMessages, ViewModel.validateRequired());
        Array.prototype.push.apply(errorMessages, ViewModel.validatePersonalIdentificationIs7DigitsNumber());
        Array.prototype.push.apply(errorMessages, ViewModel.validateSailDateInTheFuture());
        Array.prototype.push.apply(errorMessages, ViewModel.validateEmailFormat());
        Array.prototype.push.apply(errorMessages, ViewModel.validateCommentLength());
        if(errorMessages.length>0){
            View.renderErrorMessage(errorMessages);
            return false;
        }
        return true;
    },
    validateRequired:function(){
        var errorMessages=[];
        if(Model.personalIdentification==""){
            errorMessages.push("The personal identification can't be blank")
        }
        if(Model.firstName==""){
            errorMessages.push("The first name can't be blank")
        }
        if(Model.lastName==""){
            errorMessages.push("The last name can't be blank")
        }
        if(Model.email==""){
            errorMessages.push("The email can't be blank")
        }
        if(Model.brand==undefined){
            errorMessages.push("A brand needs to be selected")
        }
        if(Model.ship=="" || Model.ship==undefined){
            errorMessages.push("A ship needs to be selected")
        }
        if(Model.sailDate==""){
            errorMessages.push("A sail date needs to be selected")
        }
        return errorMessages;
    },
    validatePersonalIdentificationIs7DigitsNumber:function(){
        var errorMessages=[];
        if(isNaN(Model.personalIdentification) || Model.personalIdentification.length!=7){
            errorMessages.push("The personal identification needs to be a 7 digits number")
        }
        return errorMessages;
    },
    validateSailDateInTheFuture:function(){
        var errorMessages=[];
        if(moment(Model.sailDate).isBefore(moment(Date.now()))){
            errorMessages.push("The sail date needs to be after the current date")
        }
        return errorMessages;
    },
    validateEmailFormat:function(){
        var errorMessages=[];
        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(Model.email))){
            errorMessages.push("The email needs to have a valid format")
        }
        return errorMessages;
    },
    validateCommentLength:function(){
        var errorMessages=[];
        if($("#comments").val().length>500){
            errorMessages.push("The comment can't have more than 500 characters");
        }
        return errorMessages;
    },
    submitRegistrationForm:function(){
        arguments[0].preventDefault();
        var date=$("#sailDate").val();
        $("#sailDate").val(moment(date).format("YYYY-MM-DD"));
        if(ViewModel.validateInput()){
            $("#registration-form").submit();
        }
    },
    resetRegistrationForm:function(){
        arguments[0].preventDefault();
        $("#personalIdentification").val("");
        $("#firstName").val("");
        $("#lastName").val("");
        $("#email").val("");
        $("#includeEmailList").prop("checked", false);
        $("input[name='brand']").prop("checked", false);
        $("#ship").val("");
        View.renderShipOptions([]);
        $("#sailDate").val("");
        $("#comments").val("");
    }


}

var View={
    renderShipOptions:function(shipOptions){
        $("#ship").html("");
        var optionsHTMLString=shipOptions.reduce(function(acumulator,currentValue) {
            return acumulator+"<option>"+currentValue+"</option>";
        },"<option selected disabled hidden></option>");
        $("#ship").html( optionsHTMLString);
    },
    renderErrorMessage:function(messages){
        clearTimeout(window.Timeout);
        var errorMessageHTMLString="<h4>Correct the following errors:</h4>"
        messages.forEach(function(message) {
           errorMessageHTMLString+="<li>"+message+"</li>"
        });
        $("#errorMessage").html(errorMessageHTMLString);
        $("#errorMessage").show();
        window.location.href="#errorMessage";
        window.Timeout=setTimeout(function(){ $("#errorMessage").fadeOut(); }, 10000);
    }
}
ViewModel.hideSubmitMessageField();
$("#submitButton").on("click",ViewModel.submitRegistrationForm);
$("#resetButton").on("click",ViewModel.resetRegistrationForm)
$("#includeEmailList").on("click",ViewModel.setIncludeEmailListCheckboxValue);
$("input[name='brand']").on("click",ViewModel.setShipOptions);
$("#ship").on("click",ViewModel.checkIfBrandSelected);