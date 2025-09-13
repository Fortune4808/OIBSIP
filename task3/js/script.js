function addNewTask() {
    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;

    if (!title) {
        alert('Title is Required!');
        return;
    }

    if (!description) {
        alert('Description is Required!');
        return;
    }

    const tbody = document.querySelector('#taskTable tbody');
    const row = document.createElement('tr');

    row.innerHTML = `
    <td>${title}</td>
    <td>${description}</td>
    <td>${Date('Y')}</td>
    <td class="actions">
        <button onclick="this.closest('tr').classList.toggle('completed')" class="complete-btn">Complete</button>
        <button onclick="editTask(this)" class="complete-btn">Edit</button>
        <button onclick="this.closest('tr').remove()" class="delete" title="Delete Now">X</button>
    </td>
  `;

    tbody.appendChild(row);

    document.getElementById('title').value = '';
    document.getElementById('description').value = '';
}

function editTask(btn) {
    const row = btn.closest('tr');
    const titleCell = row.cells[0];
    const descCell = row.cells[1];

    if (btn.textContent === 'Edit') {
        titleCell.innerHTML = `<input value="${titleCell.textContent}" class="form">`;
        descCell.innerHTML = `<input value="${descCell.textContent}" class="form">`;
        btn.textContent = 'Save';
    } else {
        const newTitle = titleCell.querySelector('input').value;
        const newDesc = descCell.querySelector('input').value;
        titleCell.textContent = newTitle;
        descCell.textContent = newDesc;
        btn.textContent = 'Edit';
    }
}