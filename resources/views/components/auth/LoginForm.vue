<template>
    <div class="card text-center shadow">
        <div class="card-header"><h5>Manage {{ type }}s</h5></div>
        <div class="container-fluid">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-sm align-middle text-nowrap" v-if="records.length">
                    <thead class="align-middle">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NAME</th>
                            <th scope="col">{{ type }} ID</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">MANAGE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="record in records">
                            <td>{{ record.id }}</td>
                            <td>
                                <div>{{ record.name }}</div>
                                <div class="text-muted">{{ record.userName }}</div>
                            </td>
                            <td>{{ record.productId }}</td>
                            <td>{{ record.description }}</td>
                            <td>
                                <span v-if="record.isActive" class="text-success">Active</span>
                                <span v-else class="text-danger">Blocked</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div v-else>
                    <h3>No Record Found</h3>
                </div>
            </div>
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
                    type: "User/Device",
                    records:
                    [
                        {
                            id:545,
                            name:"Numan Naseer Nomi",
                            userName:"numan.naseer.nomi",
                            description:"sdf sd",
                            isActive:1,
                            productId: "sd5f4s"
                        },
                        {
                            id:545,
                            name:"Numan Naseer Nomi",
                            userName:"numan.naseer.nomi",
                            description:"sdf sd",
                            isActive:0,
                            productId: "sd5f4s"
                        }
                    ],
                    // records: {}
                };
    
                return data;
            },
    
            methods:
            {
                loadRecords()
                {
                    fetch('https://jsonplaceholder.typicode.com/todos')
                    .then(response => response.json())
                    .then(json => console.log(json));
                }
                // saveRecord()
                // {
                //     // console.log(this.record);
                //     this.record = {};
                //     // fetch('https://jsonplaceholder.typicode.com/todos/1')
                //     // .then(response => response.json())
                //     // .then(json => console.log(json))
    
                //     let payload =
                //     {
                //         title: "foo",
                //         body: "bar",
                //         userId: 1,
                //     };
    
                //     let apiRequestDetails =
                //     {
                //         method: "POST",
                //         body: JSON.stringify(payload),
                //         headers: {"Content-type": "application/json; charset=UTF-8"},
                //     };
    
                //     fetch("https://jsonplaceholder.typicode.com/posts", apiRequestDetails)
                //     .then((response) => response.json())
                //     .then((json) => console.log(json));
                // }
            },

            mounted()
            {
                this.loadRecords();
            }
        }
    </script>