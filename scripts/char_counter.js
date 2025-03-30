document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("bioInput").addEventListener("input", function() {
        let maxChars = 120;
        let currentLength = this.value.length;
        document.getElementById("charCount").textContent = `${currentLength}/${maxChars}`;
    });

    var counter = document.getElementById("charCount");
    var maxChars = 120;
    var bioLength = document.getElementById("bioInput").value.length;
    counter.textContent = `${bioLength}/${maxChars}`
})