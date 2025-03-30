document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("bioInput").addEventListener("input", function() {
        let maxChars = 120;
        let currentLength = this.value.length;
        document.getElementById("charCount").textContent = `${currentLength}/${maxChars}`;
    });
})