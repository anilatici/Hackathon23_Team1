<?php
?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CreateQuestion</title>
</head>
<body>
<form method="post" action="addQuestion.php" enctype="multipart/form-data">
    <div id="formField">
        <label>Title: </label>
        <input type="text" name="title"/>
    </div>
    <input type="submit" value="Submit"/>
</form>
<!--            <button onclick="addQuestion()" >Add</button>-->
<select name="addQuestions" id="addQuestions">
    <option value="1">Question Input</option>
    <option value="3">Multi Choices</option>
    <option value="2">Single Choices</option>
</select>
<button onclick="QuestionController(document.getElementById('addQuestions').value)">Add</button>
</body>

<script>
    var formField = document.getElementById("formField");
    var questions = 0;
    let questionList = ["A","B", "C", "D"];
    function QuestionController(value){

        if(value === "1") {
            console.log("add question")
            addQuestion();

        }  else if(value === "2") {
            console.log("add radio")
            addRadio();
        } else if(value === "3") {
            console.log("add multi choices")
            addMultiChoice();
        } else{
            console.log("something is wrong")
            questions --;
        }
        questions ++;
    }

    function consolelog(value){
        console.log(value);
    }
    function addQuestion(){
        var questionLabel = document.createElement("label");
        questionLabel.innerHTML = "Questions: ";
        formField.appendChild(questionLabel);
        var questionInput = document.createElement("input");
        questionInput.setAttribute("type", "text");
        let questionName = "questions["+questions+"]"+"[question]";
        questionInput.setAttribute("name", questionName);
        formField.appendChild(questionInput);
        var answer1 = document.createElement("input");
        answer1.setAttribute("type", "text");
        var answerLabel = document.createElement("label");
        answerLabel.innerHTML = "Answer: ";
        formField.appendChild(answerLabel);
        let answerName = "questions["+questions+"]"+"[answer]";
        answer1.setAttribute("name", answerName);
        formField.appendChild(answer1);
        let type= "questions["+questions+"]"+"[type]";
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("value", "1");
        input.setAttribute("name", type)
        formField.appendChild(input);
    }

    function addRadio(){
        var radioLabel = document.createElement("label");
        radioLabel.innerHTML = "Questions: ";
        formField.appendChild(radioLabel);
        var radioInput = document.createElement("input");
        radioInput.setAttribute("type", "text");
        let questionName = "questions[" + questions + "]"+"[question]";
        radioInput.setAttribute("name", questionName);
        formField.appendChild(radioInput);
        for(var i = 0; i < 4; i++){
            var label = document.createElement("label");
            label.innerHTML = questionList[i]+": ";
            formField.appendChild(label);
            var answer1 = document.createElement("input");
            answer1.setAttribute("type", "text");
            let name = "questions[" + questions + "]"+"[answer]["+i+"]";
            answer1.setAttribute("name", name);
            formField.appendChild(answer1);
            var radio = document.createElement("input");
            radio.setAttribute("type", "radio");
            let correctAns = "questions[" + questions + "]"+"[correctAns]";
            radio.setAttribute("name", correctAns);
            radio.setAttribute("value", i);
            formField.appendChild(radio);
        }
        let type= "questions["+questions+"]"+"[type]";
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("value", "2");
        input.setAttribute("name", type)
        formField.appendChild(input);
    }

    function addMultiChoice(){
        var multiChoiceLabel = document.createElement("label");
        multiChoiceLabel.innerHTML = "Questions: ";
        formField.appendChild(multiChoiceLabel);
        var multiChoiceInput = document.createElement("input");
        multiChoiceInput.setAttribute("type", "text");
        let questionName = "questions[" + questions + "]"+"[question]";
        multiChoiceInput.setAttribute("name", questionName);
        formField.appendChild(multiChoiceInput);
        for(var i = 0; i < 4; i++){
            var label = document.createElement("label");
            label.innerHTML = questionList[i]+": ";
            formField.appendChild(label);
            var answer1 = document.createElement("input");
            answer1.setAttribute("type", "text");
            let name = "questions[" + questions + "]"+"[answer]["+i+"]";
            answer1.setAttribute("name", name);
            formField.appendChild(answer1);
            var checkbox = document.createElement("input");
            checkbox.setAttribute("type", "checkbox");
            let correctAns = "questions[" + questions + "]"+"[correctAns]["+i+"]";
            checkbox.setAttribute("name", correctAns);
            checkbox.setAttribute("value", "1");
            formField.appendChild(checkbox);

        }
        let type= "questions["+questions+"]"+"[type]";
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("value", "3");
        input.setAttribute("name", type)
        formField.appendChild(input);

    }



</script>
</html>

