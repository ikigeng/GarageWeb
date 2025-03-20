// Fetch customer data from the database
document.addEventListener('DOMContentLoaded', function() {
    // Fetch user data from the server
    fetch('get-user-data.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                console.error('Error:', data.error);
                window.location.href = '../login.php?error=Session expired. Please login again.';
                return;
            }
            
            // Update dashboard with real customer data
            updateDashboard(data);
        })
        .catch(error => {
            console.error('Fetch error:', error);
            document.getElementById('error-message').textContent = 
                'Failed to load your information. Please refresh the page or contact support.';
            document.getElementById('error-message').style.display = 'block';
        });
});

// Function to update the dashboard with customer data
function updateDashboard(customerData) {
    // Update customer info
    document.getElementById('customer-name').textContent = customerData.name;
    document.getElementById('modal-customer-name').textContent = customerData.name;
    document.getElementById('customer-email').textContent = customerData.email;


    // Populate upcoming appointments
    const upcomingList = document.getElementById('upcoming-appointments');
    // Clear existing content first
    upcomingList.innerHTML = '';
    
    if (!customerData.upcomingAppointments || customerData.upcomingAppointments.length === 0) {
        upcomingList.innerHTML = '<p class="text-muted">No upcoming appointments</p>';
    } else {
        customerData.upcomingAppointments.forEach(appointment => {
            const card = document.createElement('div');
            card.className = 'appointment-card';
            
            // Add status badge with appropriate color
            const statusClass = getStatusClass(appointment.status);
            
            card.innerHTML = `
                <strong>${appointment.service}</strong><br>
                <span class="text-muted">Date:</span> ${formatDate(appointment.date)}<br>
                <span class="text-muted">Time:</span> ${appointment.time}<br>
                <span class="text-muted">Status:</span> <span class="${statusClass}">${appointment.status}</span>
            `;
            upcomingList.appendChild(card);
        });
    }

    // Populate purchase history
    const historyList = document.getElementById('purchase-history');
    // Clear existing content first
    historyList.innerHTML = '';
    
    if (!customerData.purchaseHistory || customerData.purchaseHistory.length === 0) {
        historyList.innerHTML = '<p class="text-muted">No purchase history</p>';
    } else {
        customerData.purchaseHistory.forEach(purchase => {
            const card = document.createElement('div');
            card.className = 'history-card';
            
            // Add type badge with appropriate color
            const typeClass = purchase.type === 'Product' ? 'text-primary' : 'text-success';
            
            card.innerHTML = `
                <strong>${purchase.item}</strong> <span class="badge bg-light ${typeClass}">${purchase.type}</span><br>
                <span class="text-muted">Date:</span> ${formatDate(purchase.date)}<br>
                <span class="text-muted">Price:</span> $${parseFloat(purchase.price).toFixed(2)}<br>
                <span class="text-muted">Payment:</span> ${purchase.paymentMethod}
            `;
            historyList.appendChild(card);
        });
    }
}

// Helper function to format dates nicely
function formatDate(dateString) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString(undefined, options);
}

// Helper function to get status color class
function getStatusClass(status) {
    switch(status) {
        case 'Completed':
            return 'text-success';
        case 'Cancelled':
            return 'text-danger';
        case 'Confirmed':
            return 'text-primary';
        default:
            return 'text-warning';
    }
}

// Book appointment button
document.getElementById('book-appointment').addEventListener('click', () => {
    window.location.href = 'book-appointment.php';
});

// Modal logout button if it exists
const logoutBtn = document.getElementById('modal-logout');
if (logoutBtn) {
    logoutBtn.addEventListener('click', () => {
        if (confirm('Are you sure you want to logout?')) {
            window.location.href = '../logout.php';
        }
    });
}