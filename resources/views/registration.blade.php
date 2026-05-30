<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Registration Form</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            color: #111;
            background: #fff;
        }

        .page {
            width: min(1100px, 94%);
            margin: 0 auto;
            padding: 40px 0;
        }

        .hero {
            border: 3px solid #111;
            background: #111;
            color: #fff;
            padding: 30px;
            text-align: center;
            margin-bottom: 28px;
            box-shadow: 10px 10px 0 #d8d8d8;
        }

        .hero h1 {
            margin: 0 0 8px;
            font-size: clamp(2rem, 5vw, 4rem);
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .hero p {
            margin: 0;
            color: #e8e8e8;
        }

        .grid {
            display: grid;
            grid-template-columns: 380px 1fr;
            gap: 28px;
            align-items: start;
        }

        .card {
            border: 2px solid #111;
            background: #fff;
            box-shadow: 8px 8px 0 #111;
        }

        .card-header {
            padding: 18px 20px;
            color: #fff;
            background: #111;
            border-bottom: 2px solid #111;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-body {
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.82rem;
            letter-spacing: 0.8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #111;
            background: #fff;
            color: #111;
            font: inherit;
            outline: none;
        }

        textarea {
            min-height: 88px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            box-shadow: 4px 4px 0 #111;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        button {
            border: 2px solid #111;
            padding: 11px 16px;
            font-weight: 700;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        button:hover {
            transform: translate(-2px, -2px);
            box-shadow: 4px 4px 0 #111;
        }

        .btn-primary {
            background: #111;
            color: #fff;
        }

        .btn-secondary,
        .btn-edit {
            background: #fff;
            color: #111;
        }

        .btn-danger {
            background: #111;
            color: #fff;
        }

        .message {
            display: none;
            margin-bottom: 18px;
            padding: 12px 14px;
            border: 2px solid #111;
            font-weight: 700;
        }

        .message.show {
            display: block;
        }

        .message.success {
            color: #111;
            background: #f5f5f5;
        }

        .message.error {
            color: #fff;
            background: #111;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 720px;
        }

        th,
        td {
            padding: 13px;
            text-align: left;
            border-bottom: 2px solid #111;
            vertical-align: top;
        }

        th {
            color: #fff;
            background: #111;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            font-size: 0.82rem;
        }

        tr:nth-child(even) td {
            background: #f4f4f4;
        }

        .table-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .empty {
            padding: 24px;
            text-align: center;
            border: 2px dashed #111;
            font-weight: 700;
        }

        @media (max-width: 900px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <main class="page">
        <section class="hero">
            <h1>Registration</h1>
            <p>Black & White CRUD interface powered by Laravel API routes.</p>
        </section>

        <section class="grid">
            <div class="card">
                <div class="card-header" id="formTitle">Add Registration</div>
                <div class="card-body">
                    <div id="message" class="message"></div>

                    <form id="registrationForm">
                        <input type="hidden" id="registrationId">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone_no">Phone No</label>
                            <input type="text" id="phone_no" name="phone_no" required>
                        </div>

                        <div class="form-group">
                            <label for="hobby">Hobby</label>
                            <input type="text" id="hobby" name="hobby" required>
                        </div>

                        <div class="actions">
                            <button type="submit" class="btn-primary" id="submitButton">Save Registration</button>
                            <button type="button" class="btn-secondary" id="resetButton">Reset</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Registration Records</div>
                <div class="card-body">
                    <div class="table-wrap">
                        <table id="registrationsTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Hobby</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="registrationsBody"></tbody>
                        </table>
                    </div>
                    <div id="emptyState" class="empty">No registrations found.</div>
                </div>
            </div>
        </section>
    </main>

    <script>
        const apiUrl = '/api/registrations';
        const form = document.getElementById('registrationForm');
        const message = document.getElementById('message');
        const formTitle = document.getElementById('formTitle');
        const submitButton = document.getElementById('submitButton');
        const resetButton = document.getElementById('resetButton');
        const registrationsBody = document.getElementById('registrationsBody');
        const emptyState = document.getElementById('emptyState');
        const registrationsTable = document.getElementById('registrationsTable');

        function getFormData() {
            return {
                name: document.getElementById('name').value.trim(),
                address: document.getElementById('address').value.trim(),
                email: document.getElementById('email').value.trim(),
                phone_no: document.getElementById('phone_no').value.trim(),
                hobby: document.getElementById('hobby').value.trim(),
            };
        }

        function showMessage(text, type) {
            message.textContent = text;
            message.className = 'message show ' + type;

            setTimeout(function () {
                message.className = 'message';
                message.textContent = '';
            }, 4000);
        }


        function escapeHtml(value) {
            return String(value ?? '').replace(/[&<>'"]/g, function (character) {
                return {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;',
                }[character];
            });
        }

        function resetForm() {
            form.reset();
            document.getElementById('registrationId').value = '';
            formTitle.textContent = 'Add Registration';
            submitButton.textContent = 'Save Registration';
        }

        function fillForm(registration) {
            document.getElementById('registrationId').value = registration.id;
            document.getElementById('name').value = registration.name;
            document.getElementById('address').value = registration.address;
            document.getElementById('email').value = registration.email;
            document.getElementById('phone_no').value = registration.phone_no;
            document.getElementById('hobby').value = registration.hobby;
            formTitle.textContent = 'Edit Registration';
            submitButton.textContent = 'Update Registration';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        async function fetchJson(url, options) {
            const response = await fetch(url, options);
            const data = await response.json().catch(function () {
                return {};
            });

            if (!response.ok) {
                const errors = data.errors ? Object.values(data.errors).flat().join(' ') : null;
                throw new Error(errors || data.message || 'Something went wrong.');
            }

            return data;
        }

        async function loadRegistrations() {
            try {
                const registrations = await fetchJson(apiUrl);
                registrationsBody.innerHTML = '';

                if (!registrations.length) {
                    registrationsTable.style.display = 'none';
                    emptyState.style.display = 'block';
                    return;
                }

                registrationsTable.style.display = 'table';
                emptyState.style.display = 'none';

                registrations.forEach(function (registration) {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${escapeHtml(registration.name)}</td>
                        <td>${escapeHtml(registration.address)}</td>
                        <td>${escapeHtml(registration.email)}</td>
                        <td>${escapeHtml(registration.phone_no)}</td>
                        <td>${escapeHtml(registration.hobby)}</td>
                        <td>
                            <div class="table-actions">
                                <button type="button" class="btn-edit" data-action="edit">Edit</button>
                                <button type="button" class="btn-danger" data-action="delete">Delete</button>
                            </div>
                        </td>
                    `;

                    row.querySelector('[data-action="edit"]').addEventListener('click', function () {
                        fillForm(registration);
                    });

                    row.querySelector('[data-action="delete"]').addEventListener('click', function () {
                        deleteRegistration(registration.id);
                    });

                    registrationsBody.appendChild(row);
                });
            } catch (error) {
                showMessage(error.message, 'error');
            }
        }

        async function saveRegistration(event) {
            event.preventDefault();

            const registrationId = document.getElementById('registrationId').value;
            const isEditing = Boolean(registrationId);
            const url = isEditing ? `${apiUrl}/${registrationId}` : apiUrl;
            const method = isEditing ? 'PUT' : 'POST';

            try {
                const result = await fetchJson(url, {
                    method: method,
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(getFormData()),
                });

                showMessage(result.message, 'success');
                resetForm();
                loadRegistrations();
            } catch (error) {
                showMessage(error.message, 'error');
            }
        }

        async function deleteRegistration(registrationId) {
            if (!confirm('Delete this registration?')) {
                return;
            }

            try {
                const result = await fetchJson(`${apiUrl}/${registrationId}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json',
                    },
                });

                showMessage(result.message, 'success');
                resetForm();
                loadRegistrations();
            } catch (error) {
                showMessage(error.message, 'error');
            }
        }

        form.addEventListener('submit', saveRegistration);
        resetButton.addEventListener('click', resetForm);
        document.addEventListener('DOMContentLoaded', loadRegistrations);
    </script>
</body>
</html>
