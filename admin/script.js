// API Base URL (replace with your actual API endpoint)
const API_BASE_URL = 'http://localhost:3000/api';

// Fetch and display stats
async function loadStats() {
    try {
        const appointments = await fetch(`${API_BASE_URL}/appointments`).then(res => res.json());
        const pending = appointments.filter(a => a.status === 'Pending').length;
        const customers = new Set(appointments.map(a => a.customer)).size;
        const revenueToday = appointments
            .filter(a => new Date(a.date).toDateString() === new Date().toDateString())
            .reduce((sum, a) => sum + (a.price || 0), 0);

        document.getElementById('total-appointments').textContent = appointments.length;
        document.getElementById('pending-services').textContent = pending;
        document.getElementById('total-customers').textContent = customers;
        document.getElementById('revenue-today').textContent = `$${revenueToday.toFixed(2)}`;
    } catch (error) {
        console.error('Error loading stats:', error);
    }
}

// Fetch and display appointments
async function loadAppointments() {
    try {
        const response = await fetch(`${API_BASE_URL}/appointments`);
        const appointments = await response.json();
        const tableBody = document.getElementById('appointments-table');
        tableBody.innerHTML = '';
        appointments.forEach(appt => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${appt.customer}</td>
                <td>${appt.service}</td>
                <td>${appt.date}</td>
                <td>${appt.time}</td>
                <td>${appt.status}</td>
                <td>
                    <button class="btn btn-sm btn-primary edit-appt" data-id="${appt.id}">Edit</button>
                    <button class="btn btn-sm btn-danger delete-appt" data-id="${appt.id}">Delete</button>
                </td>
            `;
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error('Error loading appointments:', error);
    }
}

// Fetch and display products
async function loadProducts() {
    try {
        const response = await fetch(`${API_BASE_URL}/products`);
        const products = await response.json();
        const tableBody = document.getElementById('products-table');
        tableBody.innerHTML = '';
        products.forEach(product => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${product.name}</td>
                <td>$${product.price.toFixed(2)}</td>
                <td>${product.stock}</td>
                <td>
                    <button class="btn btn-sm btn-primary edit-product" data-id="${product.id}">Edit</button>
                    <button class="btn btn-sm btn-danger delete-product" data-id="${product.id}">Delete</button>
                </td>
            `;
            tableBody.appendChild(row);
        });
    } catch (error) {
        console.error('Error loading products:', error);
    }
}

// Add Appointment
document.getElementById('save-appointment').addEventListener('click', async () => {
    const appointment = {
        customer: document.getElementById('appt-customer').value,
        service: document.getElementById('appt-service').value,
        date: document.getElementById('appt-date').value,
        time: document.getElementById('appt-time').value,
        status: document.getElementById('appt-status').value
    };
    try {
        await fetch(`${API_BASE_URL}/appointments`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(appointment)
        });
        bootstrap.Modal.getInstance(document.getElementById('addAppointmentModal')).hide();
        loadAppointments();
        loadStats();
    } catch (error) {
        console.error('Error adding appointment:', error);
    }
});

// Edit Appointment
document.addEventListener('click', async (e) => {
    if (e.target.classList.contains('edit-appt')) {
        const id = e.target.dataset.id;
        const response = await fetch(`${API_BASE_URL}/appointments/${id}`);
        const appt = await response.json();
        
        document.getElementById('edit-appt-id').value = appt.id;
        document.getElementById('edit-appt-customer').value = appt.customer;
        document.getElementById('edit-appt-service').value = appt.service;
        document.getElementById('edit-appt-date').value = appt.date;
        document.getElementById('edit-appt-time').value = appt.time;
        document.getElementById('edit-appt-status').value = appt.status;

        new bootstrap.Modal(document.getElementById('editAppointmentModal')).show();
    }
});

document.getElementById('update-appointment').addEventListener('click', async () => {
    const id = document.getElementById('edit-appt-id').value;
    const appointment = {
        customer: document.getElementById('edit-appt-customer').value,
        service: document.getElementById('edit-appt-service').value,
        date: document.getElementById('edit-appt-date').value,
        time: document.getElementById('edit-appt-time').value,
        status: document.getElementById('edit-appt-status').value
    };
    try {
        await fetch(`${API_BASE_URL}/appointments/${id}`, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(appointment)
        });
        bootstrap.Modal.getInstance(document.getElementById('editAppointmentModal')).hide();
        loadAppointments();
        loadStats();
    } catch (error) {
        console.error('Error updating appointment:', error);
    }
});

// Delete Appointment
document.addEventListener('click', async (e) => {
    if (e.target.classList.contains('delete-appt')) {
        if (confirm('Are you sure you want to delete this appointment?')) {
            const id = e.target.dataset.id;
            try {
                await fetch(`${API_BASE_URL}/appointments/${id}`, { method: 'DELETE' });
                loadAppointments();
                loadStats();
            } catch (error) {
                console.error('Error deleting appointment:', error);
            }
        }
    }
});

// Add Product
document.getElementById('save-product').addEventListener('click', async () => {
    const product = {
        name: document.getElementById('product-name').value,
        price: parseFloat(document.getElementById('product-price').value),
        stock: parseInt(document.getElementById('product-stock').value)
    };
    try {
        await fetch(`${API_BASE_URL}/products`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(product)
        });
        bootstrap.Modal.getInstance(document.getElementById('addProductModal')).hide();
        loadProducts();
    } catch (error) {
        console.error('Error adding product:', error);
    }
});

// Edit Product
document.addEventListener('click', async (e) => {
    if (e.target.classList.contains('edit-product')) {
        const id = e.target.dataset.id;
        const response = await fetch(`${API_BASE_URL}/products/${id}`);
        const product = await response.json();
        
        document.getElementById('edit-product-id').value = product.id;
        document.getElementById('edit-product-name').value = product.name;
        document.getElementById('edit-product-price').value = product.price;
        document.getElementById('edit-product-stock').value = product.stock;

        new bootstrap.Modal(document.getElementById('editProductModal')).show();
    }
});

document.getElementById('update-product').addEventListener('click', async () => {
    const id = document.getElementById('edit-product-id').value;
    const product = {
        name: document.getElementById('edit-product-name').value,
        price: parseFloat(document.getElementById('edit-product-price').value),
        stock: parseInt(document.getElementById('edit-product-stock').value)
    };
    try {
        await fetch(`${API_BASE_URL}/products/${id}`, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(product)
        });
        bootstrap.Modal.getInstance(document.getElementById('editProductModal')).hide();
        loadProducts();
    } catch (error) {
        console.error('Error updating product:', error);
    }
});

// Delete Product
document.addEventListener('click', async (e) => {
    if (e.target.classList.contains('delete-product')) {
        if (confirm('Are you sure you want to delete this product?')) {
            const id = e.target.dataset.id;
            try {
                await fetch(`${API_BASE_URL}/products/${id}`, { method: 'DELETE' });
                loadProducts();
            } catch (error) {
                console.error('Error deleting product:', error);
            }
        }
    }
});

// Initial load
loadStats();
loadAppointments();
loadProducts();