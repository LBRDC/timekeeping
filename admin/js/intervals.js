// Function to update the date, time, and day
function updateDateTime() {
  // Get the current date and time
  const now = new Date();

  // Format the date
  const date = now.toLocaleDateString();

  // Format the time to show only hours and minutes
  const timeOptions = { hour: "2-digit", minute: "2-digit" };
  const time = now.toLocaleTimeString(undefined, timeOptions);

  // Get the day of the week
  const days = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
  ];
  const day = days[now.getDay()];

  // Update the HTML elements
  const dateElement = document.getElementById("currentDate");
  const timeElement = document.getElementById("currentTime");
  const dayElement = document.getElementById("currentDay");
  if (dateElement && timeElement && dayElement) {
    dateElement.innerHTML = date.toString();
    timeElement.innerHTML = time.toString();
    dayElement.innerHTML = day.toString();
  }
}

// Call the function immediately to update the elements on page load
updateDateTime();

// Set an interval to update the date, time, and day every minute
setInterval(updateDateTime, 5000); // 60000 milliseconds = 1 minute
