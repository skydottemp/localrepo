document.addEventListener('DOMContentLoaded', function() {
    const taskForm = document.getElementById('taskForm');
    const taskInput = document.getElementById('taskInput');
    const taskList = document.getElementById('taskList');

    
    fetch('loadTasks.php')//loading tasks from backend
        .then(response => response.json())
        .then(data => {
            data.forEach(task => {
                addTaskToList(task);
            });
        });

   
    taskForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const newTask = taskInput.value;//adding new task
        if (newTask) {
            fetch('saveTask.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ task: newTask })
            })
            .then(response => response.json())
            .then(task => {
                addTaskToList(task);
            });

            taskInput.value = '';
        }
    });

    function addTaskToList(task) {
        const li = document.createElement('li');
        li.textContent = task;
        taskList.appendChild(li);
    }
});
