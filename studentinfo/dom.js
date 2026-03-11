// Form submit event
document.getElementById('student-form').addEventListener('submit', addStudent);

// Add student
function addStudent(event) {
    event.preventDefault();

    let studentRoll = document.getElementById('student-roll').value.trim();
    let studentName = document.getElementById('student-name').value.trim();

    if (studentRoll === '' || studentName === '') {
        alert('Please enter roll number and name');
        return;
    }

    // Create list item
    let li = document.createElement('li');
    li.classList.add('student-item');

    // Create span
    let span = document.createElement('span');
    span.textContent = studentRoll + " - " + studentName;

    // Edit button
    let editButton = document.createElement('button');
    editButton.textContent = 'Edit';
    editButton.classList.add('btn-edit');
    editButton.addEventListener('click', function () {
        editStudent(span);
    });

    // Delete button
    let deleteButton = document.createElement('button');
    deleteButton.textContent = 'Delete';
    deleteButton.classList.add('btn-delete');
    deleteButton.addEventListener('click', function () {
        deleteStudent(li);
    });

    li.appendChild(span);
    li.appendChild(editButton);
    li.appendChild(deleteButton);

    document.getElementById('student-list').appendChild(li);

    // Update student count
    updateStudentCount();

    // Clear inputs
    document.getElementById('student-roll').value = '';
    document.getElementById('student-name').value = '';
}

// Delete student
function deleteStudent(studentElement) {
    if (confirm("Are you sure you want to delete this student?")) {
        studentElement.remove();
        updateStudentCount();
    }
}

// Edit student
function editStudent(studentNameElement) {
    let newValue = prompt("Edit student (Roll - Name)", studentNameElement.textContent);

    if (newValue !== null && newValue !== '') {
        studentNameElement.textContent = newValue;
    }
}

// Update student count
function updateStudentCount() {
    let count = document.querySelectorAll('.student-item').length;

    document.getElementById('student-count').textContent =
        "Total students: " + count;
}

// Highlight students
function changeListStyle() {
    let students = document.querySelectorAll('.student-item');

    students.forEach(student => {
        student.classList.toggle('highlight');
    });
}

// Highlight button
let changeStyleButton = document.createElement('button');
changeStyleButton.textContent = 'Highlight Students';
changeStyleButton.addEventListener('click', changeListStyle);
document.body.appendChild(changeStyleButton);