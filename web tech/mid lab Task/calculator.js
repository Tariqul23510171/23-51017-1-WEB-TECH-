console.log("connected");

function appendValue(value) {
  const display = document.getElementById("display");

  if (display.value === "Invalid Input") {
    display.value = "";
  }

  display.value = display.value + value;
  return false;
}

function clearDisplay() {
  document.getElementById("display").value = "";
  return false;
}

function deleteOne() {
  const display = document.getElementById("display");
  display.value = display.value.slice(0, -1);
  return false;
}

function sanitizeInput() {
  const display = document.getElementById("display");
  display.value = display.value.replace(/[^0-9+\-*/.]/g, "");
  return false;
}

function calculateResult() {
  const display = document.getElementById("display");
  const expression = display.value;

  if (!expression) {
    return false;
  }

  try {
    const result = eval(expression);

    if (result === undefined || isNaN(result) || !isFinite(result)) {
      display.value = "Invalid Input";
    } else {
      display.value = result;
    }
  } catch (error) {
    display.value = "Invalid Input";
  }

  return false;
}