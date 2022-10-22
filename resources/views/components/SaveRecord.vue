<template>
<div class="card bg-light text-dark shadow">
	<div class="card-header text-center"><h5>Add New {User/Device}</h5></div>
        <div class="card-body">
            <form @submit.prevent="saveRecord()">
                <div class="mb-3">
                    <label class="form-label">Serial Number</label>
                    <input class="form-control form-control-sm" v-model="record.id" readonly required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Name *</label>
                    <input class="form-control form-control-sm" v-model="record.name" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">{Card/Device} ID *</label>
                    <input class="form-control form-control-sm" v-model="record.itemId" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Description *</label>
                    <input class="form-control form-control-sm" v-model="record.description" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Status *</label>
                    <select class="form-select form-select-sm" v-model="record.status" required>
                        <option value="0">Active</option>
                        <option value="1">Block</option>
                    </select>
                </div>
                <div class="row">
                    <div class="d-grid gap-2 col-6">
                        <button type="reset" @click.prevent="record = {}" class="btn btn-outline-primary btn-sm">Reset</button>
                    </div>
                    <div class="d-grid gap-2 col-6">
                        <button type="submit" class="btn btn-outline-success btn-sm">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default
    {
        data()
        {
            let data =
            {
                record: {id:545, name:"Numan Naseer Nomi", itemId:"numan.naseer.nomi", description:"sdf sd", status:0},
                // record: {}
            };

            return data;
        },

        methods:
        {
            saveRecord()
            {
                console.log(this.record);
                this.record = {};
                fetch('https://jsonplaceholder.typicode.com/todos/1')
                .then(response => response.json())
                .then(json => console.log(json))
            }
        }
    }
</script>