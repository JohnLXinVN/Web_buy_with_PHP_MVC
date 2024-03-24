// Set the target date and time for the countdown
var targetDate = new Date("2024-03-21T00:00:00Z");

// Function to update the countdown
function updateCountdown() {
    var now = new Date().getTime();
    var timeRemaining = targetDate - now;

    // Calculate the days, hours, minutes, and seconds remaining
    var days = Math.abs(Math.floor(timeRemaining / (1000 * 60 * 60 * 24)));
    var hours = Math.abs(Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
    var minutes = Math.abs(Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60)));
    var seconds = Math.abs(Math.floor((timeRemaining % (1000 * 60)) / 1000));

    // Update the countdown elements with the new values
    document.getElementById("days").innerHTML = "<h3>" + days + "</h3><span>Days</span>";
    document.getElementById("hours").innerHTML = "<h3>" + hours + "</h3><span>Hours</span>";
    document.getElementById("minutes").innerHTML = "<h3>" + minutes + "</h3><span>Mins</span>";
    document.getElementById("seconds").innerHTML = "<h3>" + seconds + "</h3><span>Secs</span>";

    // Check if the countdown has reached zero
    if (timeRemaining <= 0) {
        clearInterval(countdownInterval);
        // Perform any action you want when the countdown reaches zero
        // For example, you can reset the countdown or redirect the user
    }
}

// Update the countdown immediately
updateCountdown();

// Update the countdown every second (1000 milliseconds)
var countdownInterval = setInterval(updateCountdown, 1000);

// Toggle tim
// Lấy phần tử nút tim
var addToWishlistBtn = document.querySelector('.product-btns .add-to-wishlist');

// Thêm sự kiện click cho nút tim
addToWishlistBtn.addEventListener('click', function() {
    // Thêm hoặc xóa lớp "active" cho nút tim
    addToWishlistBtn.classList.toggle('active');
});