//elements
const elements = document.querySelectorAll(".btn");

//events
elements.forEach((element) => {
  element.addEventListener("click", () => {
    let command = element.dataset["element"];

    if (command == "createLink" || command == "insertImage") {
      let url = prompt("Enter the link here: ", "https://");
      document.execCommand(command, false, url);
    } else {
      document.execCommand(command, false, null);
    }
  });
});
