<template>
  <div>
    <h1>
      Todo List
    </h1>
    <ul>
      <li v-for="(todoElem, index) in todoList" :key="index" class="listElem">
        <div class="container">
          <div class="text" :class="{ strike: todoElem.completed }" @click="completeTask(index)">
            {{ todoElem.text }}
          </div>
          <div> <font-awesome-icon class="icon" icon="fa-solid fa-user-secret" @click="deleteTask(index)" />
          </div>
        </div>
      </li>
    </ul>
    <form @submit="addNewTask">
      <input type="text" name="newTodo" v-model="newTodoText">
      <input type="submit" value="CREATE NEW TASK">
    </form> <!-- form submit lo usiamo per attaccare un metodo per poter usare axios -->
  </div>
</template>

<script>

import axios from "axios"; /* ricordati di installare axios */

const API_URL = "http://localhost/";

export default {
  name: "TodoList",
  data() {
    return {
      todoList: [],
    };
  },
  methods: {
    getAllData() {
      axios.get(API_URL + "altra-api.php")
        .then(res => {
          const data = res.data;
          this.todoList = data;
        });
    },
    addNewTask(e) {
      e.preventDefault();

      const newTodoText = this.newTodoText;

      const params = {
        params: {
          "text": newTodoText
        }
      };

      axios.get(API_URL + "api-add-new-task.php", params)
        .then(() => {
          this.newTodoText = "";
          this.getAllData();
        });
    },
    completeTask(index) {
      console.log(index);

      const text = this.todoList[index].text;
      console.log(text);

      const completed = !this.todoList[index].completed;
      console.log(completed);

      const params = {
        params: {
          "index": index,
          "text": text,
          "completed": completed
        }
      };

      axios.get(API_URL + "api-complete-task.php", params)
        .then(() => {
          this.getAllData();
        });
    },
    deleteTask(index) {
      const params = {
        params: {
          "index": index,
        }
      };

      axios.get(API_URL + "api-delete-task.php", params)
        .then(() => {
          this.getAllData();
        });
    }
  },
  mounted() {
    this.getAllData();
  }
}


</script>

<style>
.listElem {
  margin: 10px 0;
  width: 120px;
}

.text {
  cursor: pointer;
  width: 50px;
  margin-right: 50px;
}

.strike {
  text-decoration: line-through;
}

.container {
  display: flex;
}

.icon {
  color: black;
  cursor: pointer;
}

ul {
  list-style-type: none;
}
</style>
