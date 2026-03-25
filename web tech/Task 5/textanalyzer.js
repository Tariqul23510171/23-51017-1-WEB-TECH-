console.log("connected");

function analyzeText() {
  const text = document.getElementById("inputText").value;
  const resultBox = document.getElementById("resultBox");

  if (!text.trim()) {
    resultBox.innerHTML = `
      <h3>Analysis Result</h3>
      <p><b>Total Characters:</b> 0</p>
      <p><b>Total Words:</b> 0</p>
      <p><b>Reversed Text:</b> No text entered</p>
    `;
    return false;
  }

  const totalCharacters = text.length;

  const wordsArray = text.trim().split(" ").filter(function (word) {
    return word !== "";
  });
  const totalWords = wordsArray.length;

  const reversedText = text.split("").reverse().join("");

  resultBox.innerHTML = `
    <h3>Analysis Result</h3>
    <p><b>Total Characters:</b> ${totalCharacters}</p>
    <p><b>Total Words:</b> ${totalWords}</p>
    <p><b>Reversed Text:</b> ${reversedText}</p>
  `;

  return false;
}