<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include'database.php';
$title = $_POST['title'];
$questions = $_POST['questions'];
foreach($questions as $question){
    var_dump($question);
    echo '<br>';
    $sql = "INSERT INTO questions (question_text) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $title);
    $stmt->execute();
    $stmt->closeCursor();
    $lastId = $conn->lastInsertId();
    if($lastId == 0){
        echo "error";
    } else {
        if ($question["type"] == 1) {
            if ($lastId == 0) {
                echo "error";
            } else {
                $sql = "INSERT INTO answers (question_id, answer_text,is_correct) VALUES (?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $lastId);
                $stmt->bindParam(2, $question["answer"]);
                $str = 1;
                $stmt->bindParam(3, $str);
                $stmt->execute();
                $stmt->closeCursor();
            }
        } elseif ($question["type"] == 2) {
            if ($lastId == 0) {
                echo "error";
            } else {
                $count = 0;
                foreach ($question["answer"] as $answer) {
                    $sql = "INSERT INTO answers (question_id, answer_text,is_correct) VALUES (?,?,?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(1, $lastId);
                    $stmt->bindParam(2, $answer["answer"]);
                    if ($count == $question["correctAns"]) {
                        $str = 1;
                    } else {
                        $str = 0;
                    }
                    $stmt->bindParam(3, $str);
                    $stmt->execute();
                    $stmt->closeCursor();
                    $count++;
                }
            }
        } elseif ($question["type"] == 3) {
            $count = 0;
            foreach ($question["answer"] as $answer) {
                $sql = "INSERT INTO answers (question_id, answer_text,is_correct) VALUES (?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $lastId);
                $stmt->bindParam(2, $answer);
                if (isset($question["correctAns"][$count])) {
                    $str = 1;
                } else {
                    $str = 0;
                }
                $stmt->bindParam(3, $str);
                $stmt->execute();
                $stmt->closeCursor();
                $count++;
            }

            $size = count($question["correctAns"]);
            for ($i = 0; $i < count($question["answer"]); $i++) {
                echo $question["answer"][$i];
                if (isset($question["correctAns"][$i])) {
                    echo "true";
                } else {
                    echo "false";
                }
                echo '<br>';
            }

        }
    }

}

?>
<pre>
<?php var_dump($questions);?>

</pre>
