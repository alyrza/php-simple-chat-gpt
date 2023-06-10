<?php
//https://github.com/openai-php/client
$yourApiKey = "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";
$result = "";
if (!empty($_POST['prompt'])) {
    require_once('vendor/autoload.php');
    $client = OpenAI::client($yourApiKey);
    $prompt = $_POST['prompt'];
    $result = $client->chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'user', 'content' => $prompt],
        ],
    ]);

    $result = $result['choices'][0]['message']['content'];
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }

        .response,
        .prompt {
            resize: none;
            width: 80%;
            height: 30%;
            padding: 0.8rem 1.2rem;
            font-size: 1.3rem;
            direction: rtl;
            outline: 0;
            border: 2px solid rgba(0, 0, 0, 0.2);
            border-radius: 6px;
            transition: 0.4s cubic-bezier(0.445, 0.05, 0.55, 0.95);
        }

        form {
            width: 80%;
            height: 30%;
        }

        .prompt {
            width: 100%;
            height: 100%;
        }

        .prompt:focus {
            border: 2px solid rgba(100, 200, 300, 0.8);
            box-shadow: 1px 2px 15px rgba(100, 200, 300, 0.8);
        }

        button {
            padding: 0.8rem 1.2rem;
            font-size: 1.2rem;
            cursor: pointer;
        }
    </style>
</head>

<body>


    <div class="container">

        <textarea class="response" readonly><?= $result ?></textarea>
        <form action="" method="post">
            <textarea name="prompt" class="prompt" placeholder="لطفا متن خود را بنویسید ..."></textarea>
            <button> ارسال </button>
        </form>


    </div>

</body>

</html>