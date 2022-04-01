<template>
    <div class="container d-flex">
        <div v-for="status in statuses" class="drop-zone" @drop="onDrop($event, status)" @dragenter.prevent @dragover.prevent>
            <h5>{{status}}</h5>
            <div v-for="task in cards" :key="task.id" class="drag-el bg-warning text-dark text-opacity-75" v-if="task.status === status" draggable="true" @dragstart="startDrag($event, task)" :data-task="task.id" type="button" data-toggle="modal" data-target="#exampleModalCenter" @click="clickFunction($event)">
               {{task.title}}
            </div>
            <button class="btn btn-dark text-warning col-12 mt-2 border-radius" @click="addNewTask(status)">+ Add task</button>
        </div>
        <ModalShowTask :priorities="priorities"></ModalShowTask>
        <ModalCreateTask :priorities="priorities" :status="status"></ModalCreateTask>
    </div>
</template>

<script>
import ModalShowTask from './ModalShowTask';
import ModalCreateTask from './ModalCreateTask';
import {Container, Draggable} from "vue-smooth-dnd";
    export default {
        name: "App",
        components: {
            Container,
            Draggable,
            ModalShowTask,
            ModalCreateTask
        },
        props: {
            cards: {
                type: [],
                default: () => this.tasks,
            },
            statuses: {
                type: [],
                default: () => this.statuses,
            },
            priorities: {
                type: [],
                default: () => this.priorities,
            }
        },
        data() {
            return {
            cards: [],
            statuses: [],
            priorities: [],
            }
        },
        computed: {

        },
        methods: {
            updateOrder(id, status) {
                axios.put('./api/task/updateOrder', {id: id, status: status});
            },
            getData() {
                axios.get('./task/get')
                .then((response) => {
                    this.cards = response.data.tasks;
                    this.statuses = response.data.statuses;
                    this.priorities = response.data.priorities;
                });
                this.$forceUpdate();
            },

            startDrag(event, item) {
                event.dataTransfer.dropEffect = 'all';
                event.dataTransfer.effectAllowed = 'all';
                event.dataTransfer.setData('itemID', item.id);
            },

            onDrop(event, task) {
                const itemID = event.dataTransfer.getData("itemID");
                const item = this.cards.find((task) => task.id == itemID);
                this.updateOrder(itemID, task);
                this.getData();
            },

            clickFunction(e) {
                $('#exampleModalCenter').modal('show');
                axios.post('./api/task/show', {id: $(e.target).data('task')})
                .then((response) => {
                    $('#title').val(response.data.task['title']);
                    $('#description').html(response.data.task['description']);
                    $(`#priority option[value="${response.data.task['priority']}"]`).attr('selected', 'selected');
                    $('.update-task').attr('data-task', response.data.task['id']);
                    $('.delete-task').attr('data-delete-href', response.data.task['id']);
                });
            },

            addNewTask(status) {
                $('#modalCreateTask').modal('show');
                $('.add-task').attr('data-status', status);
            }
        },
        
    }
</script>

<style>
.task_board {
    background-color: white;
    border-radius: 1.5rem;
    height: 80%;
}
.drop-zone {
    background: bisque;
    width: 50%;
    border-radius: 1.2rem;
    box-shadow: 0 0.1rem 0.2rem 0 orange;
    padding: 10px;
    margin: 5px;
    min-height: 10px;
    height: fit-content;
}
.placeholder {
    background: yellow;
    border-radius: 1.2rem;
}

.drag-el {
    cursor:pointer;
    color: white;
    padding: 5px 10px;
    margin: 2px;
    border-radius: 1.2rem;
}

drag-el:nth-last-of-type(1) {
    margin-bottom: 0;
}
</style>
