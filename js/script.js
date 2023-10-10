// Wait for the DOM to be fully loaded before executing JavaScript
document.addEventListener("DOMContentLoaded", function () {
    // Your JavaScript code goes here
  
    // Example: Add an event listener to a button
    const myButton = document.getElementById("myButton");
  
    if (myButton) {
      myButton.addEventListener("click", function () {
        // Perform an action when the button is clicked
        alert("Button clicked!");
      });
    }
  
    // Example: Fetch data from an API using the Fetch API
    fetch("https://api.example.com/data")
      .then((response) => response.json())
      .then((data) => {
        // Handle the retrieved data
        console.log(data);
      })
      .catch((error) => {
        // Handle errors
        console.error("Error fetching data:", error);
      });
  });
  
