<!-- Getting the server request -->
<?php
    $hour = 0;
    $min = 0;
    $second = 0;
    $paraValue;
    $id;

    // If id is 1 then user want to type in english so we need data from user desired file so I used file I/O in php
    if($_GET["id_"] == 1){
        $id = 1;
        if (isset($_GET["para_"])) {
            $para = $_GET['para_'];
            if ($para == " para1") {
                $file = fopen("English_Paragraphs/para1.txt","r");
                $paraValue = fread($file,filesize("English_Paragraphs/para1.txt"));
            }
            else if ($para == " para2") {
                $file = fopen("English_Paragraphs/para2.txt","r");
                $paraValue = fread($file,filesize("English_Paragraphs/para2.txt"));
            }
            else if ($para == " para3") {
                $file = fopen("English_Paragraphs/para3.txt","r");
                $paraValue = fread($file,filesize("English_Paragraphs/para3.txt"));
            }
            else if ($para == " para4") {
                $file = fopen("English_Paragraphs/para4.txt","r");
                $paraValue = fread($file,filesize("English_Paragraphs/para4.txt"));
            }
            else if ($para == " para5") {
                $file = fopen("English_Paragraphs/para5.txt","r");
                $paraValue = fread($file,filesize("English_Paragraphs/para5.txt"));
            }
            else if ($para == " para6") {
                $file = fopen("English_Paragraphs/para6.txt","r");
                $paraValue = fread($file,filesize("English_Paragraphs/para6.txt"));
            }
            else if ($para == " para7") {
                $file = fopen("English_Paragraphs/para7.txt","r");
                $paraValue = fread($file,filesize("English_Paragraphs/para7.txt"));
            }
        }
        
    }
      // If id is 2 then user want to type in hindi so we need data from user desired file so I used file I/O in php
    else{
        $id = 2;
        if (isset($_GET["para_"])) {
            $para = $_GET['para_'];
            if ($para == " para1") {
                $file = fopen("Hindi_Paragraph/parah1.txt","r");
                $paraValue = fread($file,filesize("Hindi_Paragraph/parah1.txt"));
            }
            else if ($para == " para2") {
                $file = fopen("Hindi_Paragraph/parah2.txt","r");
                $paraValue = fread($file,filesize("Hindi_Paragraph/parah2.txt"));
            }
            else if ($para == " para3") {
                $file = fopen("Hindi_Paragraph/parah3.txt","r");
                $paraValue = fread($file,filesize("Hindi_Paragraph/parah3.txt"));
            }
            else if ($para == " para4") {
                $file = fopen("Hindi_Paragraph/parah4.txt","r");
                $paraValue = fread($file,filesize("Hindi_Paragraph/parah4.txt"));
            }
            else if ($para == " para5") {
                $file = fopen("Hindi_Paragraph/parah5.txt","r");
                $paraValue = fread($file,filesize("Hindi_Paragraph/parah5.txt"));
            }
            else if ($para == " para6") {
                $file = fopen("Hindi_Paragraph/parah6.txt","r");
                $paraValue = fread($file,filesize("Hindi_Paragraph/parah6.txt"));
            }
            else if ($para == " para7") {
                $file = fopen("Hindi_Paragraph/parah7.txt","r");
                $paraValue = fread($file,filesize("Hindi_Paragraph/parah7.txt"));
            }
        }
    }

    // Now One more parameter we need to deside how much time user type so we also get this value using and set this value in time and then setting hour, min and second value because time is string varible
    if (isset($_GET["time_"])) {
            $time = $_GET['time_'];
            if ($time == " 5min ") {
                $hour = 0;
                $min = 1;
                $second = 1;
            }
            else if ($time == " 10min ") {
                $hour = 0;
                $min = 10;
                $second = 1;
            }
            else if ($time == " 20min ") {
                $hour = 0;
                $min = 20;
                $second = 1;
            }
            else if ($time == " 30min ") {
                $hour = 0;
                $min = 30;
                $second = 1;
            }
            else if ($time == " 1hour ") {
                $hour = 1;
                $min = 0;
                $second = 1;
            }
            else if ($time == " 2hour ") {
                $hour = 2;
                $min = 0;
                $second = 1;
            }
        }
?>

<!-- Now we are designing layout of page using html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/Typing_System/css/typing.css">
</head>

<body>
    <header>
        <h2>ITyping</h2>
        <ul>
            <li><a href="index.php">Typing</a></li>
            <li><a href="https://github.com/yogesh584">GitHub</a></li>
            <li><a href="https://github.com/yogesh584">linkdin</a></li>
        </ul>
    </header>
    <!-- This div use is to display the results to user but you can see in your browser that this div (#finished) is not displayed because we want to show results to user when user complete his typing or his time up we setted that when time is over and user click on done button then this div(#finished) will display -->
    <div id="finished">
        <h2>Finished</h2>
        <button id="exitButton">EXIT</button>
        <table id="resultTable">
            <tr>
                <td>Net Typing Speed</td>
                <td id="netTypingSpeed">0</td>
            </tr>
            <tr>
                <td>Number of Wrong Words</td>
                <td id="resultWrongWord">0</td>
            </tr>
            <tr>
                <td>Number of Right Words</td>
                <td id="resultRightWord">0</td>
            </tr>
            <tr>
                <td>Backspaces Used</td>
                <td id="resultBackspaceWord">0</td>
            </tr>
            <tr>
                <td>Wrong Words</td>
                <td>
                    <ul id="listOfWrongWords">
                    </ul>
                </td>
            </tr>
        </table>
    </div>
    <!-- we need these things when user first time come in this page after that we just need to remove them this will increase page speed -->
    <!-- as you can see that is time is not set then this part of code will not display to user -->
    <?php
            if (!isset($_GET["time_"])) {
            echo '<div id="chooseOption">
            <form action="typing.php" method="post">
                <input type="text" placeholder="Name" name="name" id="name">
                <select name="Time" id="time">
                    <option value="5min">5 Min</option>
                    <option value="10min">10 Min</option>
                    <option value="20min">20 Min</option>
                    <option value="30min">30 Min</option>
                    <option value="1hour">1 Hour</option>
                    <option value="2hour">2 Hour</option>
                </select>
                <select name="paragraph" id="para">
                    <option value="para1">Paragraph 1</option>
                    <option value="para2">Paragraph 2</option>
                    <option value="para3">Paragraph 3</option>
                    <option value="para4">Paragraph 4</option>
                    <option value="para5">Paragraph 5</option>
                    <option value="para6">Paragraph 6</option>
                    <option value="para7">Paragraph 7</option>
                </select>
                <input type="submit" id="submit" value = "Submit">
                </form>
            </div>'; 
            }
    ?>

    <div id="container">
        <h2 id="title">ITyping System by Yogesh Jangid</h2>
        <div id="steno">

            <!-- This div (#content) get and set and check all the words that user enter. I will discribed it in detail in below -->
            <div id="content">
                <!-- You remember that we get data from txt files using php file I/O and now we are setting values in main page using paraValue varible -->
                <div id="paraData">
                    <?php 
                        echo $paraValue;
                    ?>
                </div>

                <div>
                    <h3 id="userDataInform">Typed Data : </h3>
                <!-- You just want to know that why this div (#userData) is empty and what is the use of this div so I will just tell you so you can see a input (#userEnterText) that will help us to get values form user but we want to show user that is that word is right or wrong while he is typing. So this div (#userData) show user that what he is typeed and what word is wrong -->
                    <div id="userData">

                    </div>
                </div>

                <div id="textdiv">
                    <h5 id="request">Type this : </h5>

                    <!-- Now you have a new question what this empty paragraph (#text) is doing here I will tell you. So this div take one word (starting word) from our paraData div and show to user. this paragraph (#text) tell user that what should user type and it empty its value and take next word from paraDiv and than next and next. By this it help user -->

                    <p id="text"></p>
                </div>    


                <h2 id="typingHeading">Type Here : </h2>
                <!-- this is nothing but just an input are that get words from user -->
                <input type="text" id="userEnterText" placeholder="Click Here To Start">
            </div>

            <!-- This div (#wrongOrRight) tells user about how many wrong,right words he typeed , how much time remaning, how many backspace he used and if user want to get his result middle of typing and if user want to exit then this div handle these things using javascript -->

            <div id="wrongOrRight">
                <ul>
                    <li>Wrong Words : <span id="wrongWordsValue">0</span></li>
                    <li>Right Words : <span id="rightWordsValue">0</span></li>
                    <li>Time Left : <span id="timeLeft">
                        <span id="hourTag">00</span> : 
                        <span id="minTag">00</span> : 
                        <span id="secondTag">00</span>
                    </span></li>
                    <li>Backspace : <span id="BackSpaceValue">0</span></li>
                    <li id="done">DONE</li>
                    <li id="exit">EXIT</li>
                </ul>
            </div>
        </div>

    </div>
</body>
<script>

// We are getting all the require html tages here 
let paraData = document.getElementById("paraData");
let text = document.getElementById("text");
let userEnterText = document.getElementById("userEnterText");
let wrongWordsValue = document.getElementById("wrongWordsValue");
let rightWordsValue = document.getElementById("rightWordsValue");
let typingSpeedValue = document.getElementById("typingSpeedValue");
let userData = document.getElementById("userData");
let submit = document.getElementById("submit");
let chooseOption = document.getElementById("chooseOption");
let container = document.getElementById("container");
let name = document.getElementById("name");
let time = document.getElementById("time");
let para = document.getElementById("para");
let BackSpaceValue = document.getElementById("BackSpaceValue");
let exit = document.getElementById("exit");
let hourTag = document.getElementById("hourTag");
let minTag = document.getElementById("minTag");
let secondTag  = document.getElementById("secondTag");
let resultWrongWord = document.getElementById("resultWrongWord");
let resultRightWord = document.getElementById("resultRightWord");
let resultBackspaceWord = document.getElementById("resultBackspaceWord");
let listOfWrongWords = document.getElementById("listOfWrongWords");
let finished = document.getElementById("finished");
let netTypingSpeed = document.getElementById("netTypingSpeed");
let exitButton = document.getElementById("exitButton");
let boldWale = document.getElementsByClassName("boldWale");
let done = document.getElementById("done");

// We are defining some varibles here that helps us to work like number of wrong words , number of right words etc...

let i = 0;
let WrongWords = 0;
let RightWords = 0;
let typingSpeed = 0;
let wordsTypeed = 0;
let charTypeed = 0;
let BackspceValue = 0;
let totalMinutes = 0;
let timeChangerId;
let paraDataText = paraData.innerText;

// I know that you are too querious about what this line is doing because i use php and javascript mixture here. I know this is not a good way but I have no option to check that is user want to type in hindi or english You remember that varible id (in line number 7) that tell us (programe) about what user want to type (english or hindi) by this we also decide for what langauge (hindi or english) user want to type and we store this in a varible name isHindi

let isHindi = <?php echo $id ?>;

// If user want to type in hindi then we just change font family to Kruti-dev (hindi font) 

if (isHindi == 2) {
    paraData.style.fontFamily = "Kruti-Dev";
    userData.style.fontFamily = "Kruti-Dev";
    text.style.fontFamily = "Kruti-Dev";
    userEnterText.style.fontFamily = "Kruti-Dev";
    userEnterText.placeholder = "यहां क्लिक करें";
}

// When user is deciding that which paragraph or how many time to type then we need that value to pass in the url because by url we will check that is user decided or not so when user click on submit button then we don't want to display chooseOptiop div because user choosed and we changed url.

if (submit) {
    submit.addEventListener("click", (e) => {
        chooseOption.style.display = "none";
        container.style.filter = "blur(0px)";
        console.log("submit clicked");
        let id = <?php echo $id; ?>;
        window.location.href =
            `typing.php/?id = ${id} &time = ${time.value} & para = ${para.value}`;
        e.preventDefault();
    });
} else {
    container.style.filter = "blur(0px)";
}


// This small function is base of this typing system because you remember that paragraph (#text) that get word from paraValue is work by the use of this function.
// Until space not comes out get character from paraData (paraValue setted in paraData in line number 294) and add that character in text. this is how this function work
function newWord() {
    while (paraDataText[i] != ' ') {
        text.innerHTML += paraDataText[i];
        i++;
        if (i >= paraDataText.length) {
            i = 0;
            break;
        }
    }
    i++;
}

// This is an exit button that you can see in browser when time is up and this help us to exit by changing url as you see
exitButton.addEventListener("click",()=>{
    window.location = "/Typing_System/index.php";
});


// This is exit button you see while you type and this varible (exit) help us to exit from typing page
exit.addEventListener("click",()=>{
    window.location = "/Typing_System/index.php";
});


// you know new word function that I tell you before invoked (run) here and set value to text
newWord();

// To start timer we use setInterval as you see and we will clear interval when time up or hour, minute and second will equal to 0
userEnterText.addEventListener("click",()=>{
    timeChangerId =  setInterval(timeChanger,1000);
    userEnterText.placeholder = "";
});


// Now we have realWord and user is entering the text and we have to do some work that we have done before that is getting next word and setting it to text and we need to clear text to add new value so for that we define that listner 
userEnterText.addEventListener("keyup", function(event) {
    charTypeed++;
    // event.keyCode == 8 meanse that user entred backspace and we must increment number of backspace that usre used and set it to html
    if (event.keyCode == 8) {
        BackspceValue++;
        BackSpaceValue.innerHTML = BackspceValue;
        resultBackspaceWord.innerHTML = BackspceValue;
    }
    // event.keyCode == 32 means that user entred space now main work is started
    if (event.keyCode === 32) {
        // we increased wordsTypeed
        wordsTypeed++;

        // Now we need to check is user entred right word or not for that we use this if statement 
        if (userEnterText.value == text.innerText + ' ') {
            console.log("matched");
            userData.innerHTML += userEnterText.value;
            userEnterText.value = '';
            text.innerHTML = '';
            newWord();
            RightWords++;
            rightWordsValue.innerHTML = RightWords;
            resultRightWord.innerHTML = RightWords;
        } else {    // You can see that is word is not matched we need to make is red as shown
            console.log("not matched");
            text.innerHTML = '';
            if (isHindi == 2) {
                userData.innerHTML += "<b style = 'color: red;font-family : Kruti-Dev' class = 'boldWale'>" + userEnterText.value + "</b>";
            }
            else{
                userData.innerHTML += "<b style = 'color: red' class = 'boldWale'>" + userEnterText.value + "</b>";    
            }
            listOfWrongWords.innerHTML += "<li>" + userEnterText.value + "</li>";
            userEnterText.value = '';
            newWord();
            WrongWords++;
            wrongWordsValue.innerHTML = WrongWords;
            resultWrongWord.innerHTML = WrongWords;
        }
    }
});


// Now we need to get hour value, miniute value and second value by php and javascript 

let hourValue = <?php echo $hour ?>;
let minValue = <?php echo $min ?>;
let secondValue = <?php echo $second ?>;

// Now we define this time changer function that help to change time as shown
function timeChanger(){
    hourTag.innerHTML = hourValue;
    minTag.innerHTML = minValue;
    secondTag.innerHTML = secondValue;

    secondValue--;

    if (secondValue == 0 && minValue != 0) {
        secondValue = 59;
        console.log("secondValue is now 0");
        minValue--;
        totalMinutes++;
    }
    if (minValue == 0 && secondValue == 0) {
        if (hourValue != 0) {
            secondValue = 59;
            hourValue--;
            minValue = 59;  
        }
        else if (secondValue == 0) {
            // Now time is over we need to clear interval and show the result to user
            clearInterval(timeChangerId);
            console.log("interval is cleared");
            finished.classList.toggle("finishedActive");
            container.style.filter = "blur(20px)";
            let upperValueOfTypingFormula = (charTypeed / 5) - WrongWords;
                netTypingSpeed.innerHTML = upperValueOfTypingFormula / totalMinutes;
        }
    }
}

// This is another case when we display result to user (when user click to done button)
done.addEventListener("click",()=>{
    clearInterval(timeChangerId);
    console.log("interval is cleared");
    finished.classList.toggle("finishedActive");
    container.style.filter = "blur(20px)";
    let upperValueOfTypingFormula = (charTypeed / 5) - WrongWords;
    netTypingSpeed.innerHTML = upperValueOfTypingFormula / totalMinutes;
});

</script>

</html>