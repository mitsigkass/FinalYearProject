<!DOCTYPE html>
<html lang="en"><head>
  <!--
   * This is a Northumbria University Coursework.
   *
   *  @author mitsigkas
  -->

  <meta charset="UTF-8">

<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
<meta name="apple-mobile-web-app-title" content="CodePen">

<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">

<link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">


  <title>CodePen - Pure CSS 404</title>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather|Merriweather+Sans">

<style>
html, html::after, html::before, body, body::after, body::before, head, head::after, head::before, style, style::after, style::before {
  content: "";
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  display: block;
  height: 0;
}

body::after, html::before, html::after, head::after, head, style {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  margin: auto;
}

:root {
  --main-color-hue: 217;
  --main-color: hsla(var(--main-color-hue), 97%, 61%, 1);
  --black: #222;
  --red: #ED6B5F;
}

style {
  overflow: hidden;
  color: transparent;
  line-height: 0;
  width: 5.1rem;
  height: 2rem;
  margin-top: 0.2rem;
}
style::before {
  width: 0.3rem;
  height: 0.3rem;
  background: var(--black);
  margin-top: 1.6rem;
  margin-left: 1.6rem;
  border-radius: 50%;
  box-shadow: 0 0 0 0.3rem white, 1.4rem -0.2rem 0 var(--black), 1.5rem 0 0 0.3rem white;
}

head {
  width: 5.1rem;
  height: 5.1rem;
  background: var(--main-color);
  border-radius: 50%;
  margin: auto;
  z-index: -1;
  box-shadow: 0 0 0 2rem hsla(var(--main-color-hue), 97%, 61%, 0.1), 0 0 0 4rem hsla(var(--main-color-hue), 97%, 61%, 0.05), 0 0 0 6rem hsla(var(--main-color-hue), 97%, 61%, 0.025);
}
head::after {
  background: #222;
  border-radius: 4rem 4rem 0.5rem 0.5rem;
  width: 1.1rem;
  height: 0.5rem;
  background: var(--red);
  margin-bottom: 1.2rem;
  box-shadow: 0 -0.3rem 0 0.3rem var(--black);
}

html {
  background: #f9f9f9;
  font-family: system-ui, Helvetica, Roboto, sans-serif;
  text-align: center;
}
html::after {
  line-height: 0;
  height: 0;
  transform: translatex(1rem);
  content: "4 4";
  font-size: 7rem;
  color: #3C86FC;
  letter-spacing: 2rem;
  font-weight: bold;
}
html::before {
  content: "You seem lost.";
  font-family: "Merriweather", serif;
  color: var(--main-color);
  font-weight: bolder;
  line-height: 0;
  height: 0;
  transform: translatey(11rem);
  font-size: 2rem;
}

body {
  width: 100vw;
  height: 100vh;
  overflow-x: hidden;
}
body::after {
  content: "The page you are trying to reach doesn't exist.";
  font-family: "Merriweather Sans", sans-serif;
  color: var(--black);
  font-size: 1rem;
  line-height: 0;
  height: 0;
  transform: translatey(14rem);
}
</style>

  <script>
  window.console = window.console || function(t) {};
</script>



  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no">










</body></html>
