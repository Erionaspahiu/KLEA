// Booking state management
let bookingState = {
    currentStep: 1,
    guestDetails: {},
    selectedRoom: null,
    extras: [],
    totalAmount: 0
};

// Room prices
const roomPrices = {
    deluxe: 500,
    presidential: 1500,
    royal: 2500
};

// Extra prices
const extraPrices = {
    airportTransfer: 100,
    breakfast: 50,
    earlyCheckin: 100,
    lateCheckout: 100,
    spaPackage: 200
};

// Booking modal functionality
function openBookingModal() {
    const modal = document.getElementById('bookingModal');
    modal.style.display = 'block';
    resetBookingForm();
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'none';
    if (modalId === 'bookingModal') {
        resetBookingForm();
    }
}

// Navigation between steps
document.querySelectorAll('.next-step').forEach(button => {
    button.addEventListener('click', () => {
        if (validateCurrentStep()) {
            navigateToStep(bookingState.currentStep + 1);
        }
    });
});

document.querySelectorAll('.prev-step').forEach(button => {
    button.addEventListener('click', () => {
        navigateToStep(bookingState.currentStep - 1);
    });
});

function navigateToStep(step) {
    // Hide current step
    document.getElementById(`step${bookingState.currentStep}`).style.display = 'none';
    document.querySelector(`.progress-step[data-step="${bookingState.currentStep}"]`).classList.remove('active');
    
    // Show new step
    bookingState.currentStep = step;
    document.getElementById(`step${step}`).style.display = 'block';
    document.querySelector(`.progress-step[data-step="${step}"]`).classList.add('active');
    
    if (step === 4) {
        updateBookingSummary();
    }
}

// Validate each step
function validateCurrentStep() {
    switch(bookingState.currentStep) {
        case 1:
            return validateGuestDetails();
        case 2:
            return bookingState.selectedRoom !== null;
        case 3:
            return true; // Extras are optional
        default:
            return false;
    }
}

function validateGuestDetails() {
    const form = document.getElementById('guestDetailsForm');
    const formData = new FormData(form);
    
    // Store guest details
    bookingState.guestDetails = {
        firstName: document.getElementById('firstName').value,
        lastName: document.getElementById('lastName').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
        adults: document.getElementById('adults').value,
        children: document.getElementById('children').value,
        checkIn: document.getElementById('checkIn').value,
        checkOut: document.getElementById('checkOut').value
    };

    return form.checkValidity();
}

// Room selection
document.querySelectorAll('.select-room').forEach(button => {
    button.addEventListener('click', (e) => {
        const roomType = e.target.dataset.room;
        bookingState.selectedRoom = roomType;
        
        // Update UI
        document.querySelectorAll('.select-room').forEach(btn => {
            btn.classList.remove('selected');
        });
        e.target.classList.add('selected');
        
        // Enable next button
        e.target.closest('.booking-step').querySelector('.next-step').disabled = false;
    });
});

// Handle extras selection
document.querySelectorAll('.extra-option input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        updateExtras();
    });
});

function updateExtras() {
    bookingState.extras = Array.from(document.querySelectorAll('.extra-option input[type="checkbox"]:checked'))
        .map(checkbox => checkbox.id);
}

// Calculate total amount
function calculateTotal() {
    const checkIn = new Date(bookingState.guestDetails.checkIn);
    const checkOut = new Date(bookingState.guestDetails.checkOut);
    const nights = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
    
    // Room cost
    let total = roomPrices[bookingState.selectedRoom] * nights;
    
    // Extras cost
    bookingState.extras.forEach(extra => {
        if (extra === 'breakfast') {
            // Breakfast is per person per day
            total += extraPrices[extra] * nights * (parseInt(bookingState.guestDetails.adults) + parseInt(bookingState.guestDetails.children));
        } else {
            total += extraPrices[extra];
        }
    });
    
    return total;
}

// Update booking summary
function updateBookingSummary() {
    const summary = document.getElementById('bookingSummary');
    const total = calculateTotal();
    bookingState.totalAmount = total;
    
    const checkIn = new Date(bookingState.guestDetails.checkIn);
    const checkOut = new Date(bookingState.guestDetails.checkOut);
    const nights = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
    
    let summaryHTML = `
        <p><strong>Guest:</strong> ${bookingState.guestDetails.firstName} ${bookingState.guestDetails.lastName}</p>
        <p><strong>Dates:</strong> ${bookingState.guestDetails.checkIn} to ${bookingState.guestDetails.checkOut} (${nights} nights)</p>
        <p><strong>Guests:</strong> ${bookingState.guestDetails.adults} adults, ${bookingState.guestDetails.children} children</p>
        <p><strong>Room:</strong> ${bookingState.selectedRoom.charAt(0).toUpperCase() + bookingState.selectedRoom.slice(1)} Suite</p>
    `;
    
    if (bookingState.extras.length > 0) {
        summaryHTML += '<p><strong>Extras:</strong></p><ul>';
        bookingState.extras.forEach(extra => {
            summaryHTML += `<li>${extra.charAt(0).toUpperCase() + extra.slice(1).replace(/([A-Z])/g, ' $1')}</li>`;
        });
        summaryHTML += '</ul>';
    }
    
    summary.innerHTML = summaryHTML;
    document.getElementById('totalAmount').textContent = `$${total}`;
}

// Handle payment submission
document.getElementById('paymentForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    // Here you would typically send the booking data to your server
    const bookingData = {
        ...bookingState.guestDetails,
        room: bookingState.selectedRoom,
        extras: bookingState.extras,
        totalAmount: bookingState.totalAmount,
        payment: {
            cardName: document.getElementById('cardName').value,
            cardNumber: document.getElementById('cardNumber').value,
            expiryDate: document.getElementById('expiryDate').value,
            cvv: document.getElementById('cvv').value
        }
    };
    
    try {
        // Simulate API call
        await processBooking(bookingData);
        alert('Booking confirmed! A confirmation email has been sent to your email address.');
        closeModal('bookingModal');
    } catch (error) {
        alert('There was an error processing your booking. Please try again.');
    }
});

// Simulate booking process
async function processBooking(bookingData) {
    // This is where you would make an API call to your backend
    return new Promise((resolve) => {
        setTimeout(() => {
            resolve({ success: true });
        }, 2000);
    });
}

// Reset booking form
function resetBookingForm() {
    bookingState = {
        currentStep: 1,
        guestDetails: {},
        selectedRoom: null,
        extras: [],
        totalAmount: 0
    };
    
    // Reset UI
    document.querySelectorAll('.booking-step').forEach(step => {
        step.style.display = 'none';
    });
    document.getElementById('step1').style.display = 'block';
    
    document.querySelectorAll('.progress-step').forEach(step => {
        step.classList.remove('active');
    });
    document.querySelector('.progress-step[data-step="1"]').classList.add('active');
    
    document.querySelectorAll('form').forEach(form => form.reset());
    document.querySelectorAll('.select-room').forEach(btn => btn.classList.remove('selected'));
    document.querySelectorAll('.next-step').forEach(btn => btn.disabled = false);
}

// Date validation
document.getElementById('checkIn').addEventListener('change', validateDates);
document.getElementById('checkOut').addEventListener('change', validateDates);

function validateDates() {
    const checkIn = new Date(document.getElementById('checkIn').value);
    const checkOut = new Date(document.getElementById('checkOut').value);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    if (checkIn < today) {
        alert('Check-in date cannot be in the past');
        document.getElementById('checkIn').value = '';
        return false;
    }
    
    if (checkOut <= checkIn) {
        alert('Check-out date must be after check-in date');
        document.getElementById('checkOut').value = '';
        return false;
    }
    
    return true;
}

// Handle room details modal
function openRoomDetails(roomType) {
    const modal = document.getElementById('roomDetailsModal');
    const roomTitle = modal.querySelector('.room-title');
    const roomDescription = modal.querySelector('.room-description');
    const roomPrice = modal.querySelector('.room-price');

    switch(roomType) {
        case 'deluxe':
            roomTitle.textContent = 'Deluxe Suite';
            roomDescription.textContent = 'Our spacious Deluxe Suite features a king-size bed, private balcony, luxury bathroom with deep soaking tub, and stunning city views.';
            roomPrice.textContent = 'From $500 per night';
            break;
        case 'presidential':
            roomTitle.textContent = 'Presidential Suite';
            roomDescription.textContent = 'The Presidential Suite offers unparalleled luxury with a separate living area, dining room, executive office, and panoramic views of the city.';
            roomPrice.textContent = 'From $1,500 per night';
            break;
        case 'royal':
            roomTitle.textContent = 'Royal Villa';
            roomDescription.textContent = 'Our exclusive Royal Villa provides the ultimate private sanctuary with a private pool, garden, butler service, and bespoke amenities.';
            roomPrice.textContent = 'From $2,500 per night';
            break;
    }
    
    modal.style.display = 'block';
}

// Format credit card input
document.getElementById('cardNumber').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 16) value = value.slice(0, 16);
    e.target.value = value;
});

// Format expiry date input
document.getElementById('expiryDate').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 4) value = value.slice(0, 4);
    if (value.length > 2) {
        value = value.slice(0, 2) + '/' + value.slice(2);
    }
    e.target.value = value;
});

// Format CVV input
document.getElementById('cvv').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 4) value = value.slice(0, 4);
    e.target.value = value;
});

// Handle dining menu button
function viewMenu() {
    const modal = document.getElementById('menuModal');
    modal.style.display = 'block';
}

// Handle spa booking
function bookSpa() {
    const modal = document.getElementById('spaModal');
    modal.style.display = 'block';
}

// Close modals when clicking outside
window.onclick = function(event) {
    const modals = document.getElementsByClassName('modal');
    for (let modal of modals) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
} 