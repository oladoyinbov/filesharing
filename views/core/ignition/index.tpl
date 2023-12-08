<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{$pagename} {$error_type}</title>
</head>
<style>
  body {
    background-color: white;
    margin: 5vw;
    font-family: arial;
  }

  a {
    text-decoration: none;
    color: white;
  }

  .nav {
    display: flex;
    padding: 25px;
    margin-bottom: 10px;
    flex-direction: row;
    justify-content: space-between;
    background-color: #1E2A36;
    color: white;
    box-shadow: 7px 7px 14px #c3c3c3,
      -7px -7px 14px #fdfdfd;
  }

  .nav_button {
    background-color: #FFC107;
    padding: 10px;
    border: 1px;
    border-radius: 10px;
  }

  .flex {
    display: flex;
  }

  .glass {
    backdrop-filter: blur(25px) saturate(137%);
    -webkit-backdrop-filter: blur(25px) saturate(137%);
    background-color: rgba(17, 25, 40, 0.35);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);
  }

  .all_error_message {
    color: black;
    margin: 3%;
    word-spacing: 0.1em;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

  }

  .error_type {
    background-color: #FFC107;
    font-weight: 700;
    padding: 5px;
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
  }

  .error_snippet {
    font-family: sans-serif;
    word-break: break-all;
    margin: 4%;
    margin-top: 0%;
    padding: 8px;
    background-color: #1E2A36;
    box-shadow: 2px 1px 5px red;
    border-radius: 0px;
    background: linear-gradient(145deg, #cacaca, #f0f0f0);
    box-shadow: 7px 7px 14px #c3c3c3,
      -7px -7px 14px #fdfdfd;
  }

  .error_snippet_text {
    padding: 0px;
    color: black;
    font-size: 15px;
    font-weight: 600;
    word-spacing: 2px;
    font-size: 12px;
    font-family: 'Courier New', Courier, monospace;
  }
</style>

<body>

  <header style="padding: 10px; margin-top: 0%; margin-bottom: 5%;">

    <nav class="nav">

      <div>
        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50"
            class="main-grid-item-icon" fill="#FFC107" stroke="#7A631B" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="3.6">
            <circle cx="12" cy="12" r="10" />
            <line x1="12" x2="12" y1="8" y2="12" />
            <line x1="12" x2="12.01" y1="16" y2="16" />
          </svg></span>

        <span style="font-size: 40px; font-weight: 999;">Exception</span>

      </div>

      <div>
        <a style="margin: 4px;" href="js:void" onclick="window.location.reload()">
          <button class="nav_button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
              class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2">
              <polyline points="1 4 1 10 7 10" />
              <polyline points="23 20 23 14 17 14" />
              <path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15" />
            </svg>
          </button>
        </a>

        <a href="js:void"
          onclick="window.open('https://www.google.com/search?q='+ encodeURIComponent('How to fix a {$error_code} {$error_type} Error'), '_blank')">
          <button class="nav_button">


            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
              class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2">
              <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
              <polyline points="15 3 21 3 21 9" />
              <line x1="10" x2="21" y1="14" y2="3" />
            </svg>


          </button>
        </a>
      </div>

    </nav>

  </header>



  <div style="border-left: 9px solid #1E2A36;">

    <h2 class="all_error_message"><span class="error_type">{$error_type}:</span> {$error_message}</h2>

    <div style="background-color: #F3F3F3;">

      <p class="error_snippet_text">
      <pre>
        <code class="language-php">
        {$error_snippet}
        </code>
      </pre>
      </p>
    </div>

  </div>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/default.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/languages/go.min.js"></script>
  <script>hljs.highlightAll();</script>
</body>

</html>