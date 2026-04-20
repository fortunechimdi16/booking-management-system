document.addEventListener("DOMContentLoaded", function () {
    const checkin = document.getElementById("checkin_date");
    const checkout = document.getElementById("checkout_date");
    const rooms = document.getElementById("num_rooms");
    const priceDisplay = document.getElementById("priceDisplay");
    const form = document.querySelector("form"); // Select the form

    // Ensure elements exist before using them
    if (!checkin || !checkout || !rooms || !form) {
        console.error("One or more form elements are missing!");
        return;
    }

    // Set default minimum check-in date to today
    const today = new Date().toISOString().split("T")[0];
    checkin.setAttribute("min", today);

    // Ensure checkout date cannot be before or on the check-in date
    checkin.addEventListener("change", function () {
        if (checkin.value) {
            let minCheckout = new Date(checkin.value);
            minCheckout.setDate(minCheckout.getDate() + 1); // Checkout must be at least the next day
            checkout.setAttribute("min", minCheckout.toISOString().split("T")[0]);
        }
    });

    // Function to calculate the estimated price
    function calculatePrice() {
        if (!checkin.value || !checkout.value) return; // Ensure dates are selected

        const checkinDate = new Date(checkin.value);
        const checkoutDate = new Date(checkout.value);
        const roomCount = parseInt(rooms.value) || 1;
        const nightlyRate = 150; // Base price per room per night

        // Validate dates and calculate price
        if (checkoutDate > checkinDate) {
            const nights = Math.round((checkoutDate - checkinDate) / (1000 * 60 * 60 * 24));
            const totalCost = nights * roomCount * nightlyRate;

            if (priceDisplay) {
                priceDisplay.innerText = `Estimated Cost: $${totalCost}`;
            }
        } else {
            if (priceDisplay) priceDisplay.innerText = ""; // Clear price if dates are invalid
        }
    }

    // Attach event listeners for price calculation
    checkin.addEventListener("change", calculatePrice);
    checkout.addEventListener("change", calculatePrice);
    rooms.addEventListener("input", calculatePrice);

    // Handle form submission to prevent page refresh
    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default page reload

        // Optional: Add form validation here (e.g., check if all fields are filled)
        if (!checkin.value || !checkout.value || rooms.value < 1) {
            alert("Please fill in all required fields correctly.");
            return;
        }

        // Optionally: Show a confirmation before submitting
        if (confirm("Are you sure you want to proceed with the reservation?")) {
            form.submit(); // Manually submit after validation
        }
    });

    // Calculate price on page load (if dates are pre-filled)
    calculatePrice();
});
