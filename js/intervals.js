// Function to update the date, time, and day
function updateDateTime() {
    // Get the current date and time
    const now = new Date();

    // Format the date
    const date = now.toLocaleDateString();

    // Format the time
    const time = now.toLocaleTimeString();

    // Get the day of the week
    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const day = days[now.getDay()];

    // Update the HTML elements
    document.getElementById('currentDate').textContent = date;
    document.getElementById('currentTime').textContent = time;
    document.getElementById('currentDay').textContent = day;
}

// Call the function immediately to update the elements on page load
updateDateTime();

// Set an interval to update the date, time, and day every minute
setInterval(updateDateTime, 60000); // 60000 milliseconds = 1 minute