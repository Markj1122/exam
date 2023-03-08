function clickCopy() {
    var copyText = document.getElementById("shorturl");
    copyText.select();
    navigator.clipboard.writeText(copyText.value);
    alert("copied!");
}