




// window.addEventListener("load", function () {
//     const loadG = sessionStorage.getItem("loadGT");
//     if (loadG === "1") {
//         $.getScript("https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit");
//     }
// })

// function GTranslateFireEvent(a, b) {
//     try {
//         if (document.createEvent) {
//             var c = document.createEvent("HTMLEvents");
//             c.initEvent(b, true, true);
//             a.dispatchEvent(c);
//         } else {
//             var c = document.createEventObject();
//             a.fireEvent("on" + b, c);
//         }
//     } catch (e) {
//     }
// }

// function doTranslate(a) {
//     const loadG = sessionStorage.getItem("loadGT");
//     if (loadG === null) {
//         $.getScript("https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit");
//         sessionStorage.setItem("loadGT", 1);
//     }

//     if (a.value) a = a.value;
//     if (a === "") return;
//     const b = a.split("|")[1];
//     var c;
//     const d = document.getElementsByTagName("select");
//     for (let i = 0; i < d.length; i++) if (d[i].className === "goog-te-combo"){

//         c = d[i];
//         if (document.getElementById("google_translate_element2") === null || document.getElementById('google_translate_element2').innerHTML.length === 0 || c.length === 0 || c.innerHTML.length === 0) {
//             setTimeout(function () {
//                 doTranslate(a);
//             }, 500);
//         } else {
//             c.value = b;
//             GTranslateFireEvent(c, "change");
//             GTranslateFireEvent(c, "change");
//         }

//     }

// }

// function googleTranslateElementInit() {
//     const translateElement = new google.translate.TranslateElement({
//         pageLanguage: "vi",
//         includedLanguages: "vi,en,zh-CN,de,fr,ja,ko,ru",
//         multilanguagePage: false,
//         autoDisplay: false
//     }, "google_translate_element2");
//     $("#goog-gt-tt h1").remove();
// }
