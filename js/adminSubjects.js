function reset(){
    var program = document.forms['adminSubs']['program'];
    var sub = document.forms['adminSubs']['subjectName'];
    var subCode = document.forms['adminSubs']['subjectCode'];
    var faculty = document.forms['adminSubs']['facultyName'];

    program.value = "none";
    sub.value = "";
    subCode.value = "";
    faculty.value = "";
}