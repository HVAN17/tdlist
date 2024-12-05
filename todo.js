function addTodo() {
    const todoInput = document.getElementById("todo-input");
    const todoText = todoInput.value.trim();

    if (todoText === "") {
        alert("Vui lòng nhập tên công việc!");
        return;
    }

    const li = document.createElement("li");
    li.textContent = todoText;

    // Sự kiện click để đánh dấu hoàn thành
    li.addEventListener("click", function () {
        li.classList.toggle("completed");
    });

    const deleteBtn = document.createElement("button");
    deleteBtn.textContent = "Xóa";
    deleteBtn.className = "delete-btn";

    // Không gán sự kiện "click" cho nút "Xóa"
    // deleteBtn.addEventListener("click", function (event) {
    //     event.stopPropagation(); 
    //     li.remove();
    // });

    li.appendChild(deleteBtn);
    document.getElementById("todo-list").appendChild(li);

    todoInput.value = "";
}
