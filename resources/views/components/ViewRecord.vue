<template>
    <div class="card text-center shadow">
        <div class="card-header"><h5>Manage Attendance {Card/Device}s</h5></div>
        <div class="container-fluid">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-sm align-middle text-nowrap" v-if="records.length">
                    <thead class="align-middle">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NAME</th>
                            <th scope="col">{Card/Device} ID</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">MANAGE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="editRow{{ record.id }}" v-for="record in records">
                            <td>{{ record.id }}</td>
                            <td>
                                <div>{{ record.name }}</div>
                                <div class="text-muted">{{ record.userName }}</div>
                            </td>
                            <!-- <td>{{ record.cardId . record.deviceId}}</td> -->
                            <td>{{ record.description }}</td>
                            <!-- <td>
                                @if(record.isBlocked)
                                    <span class="text-danger">Blocked</span>
                                @else
                                    <span class="text-success">Active</span>
                                @endif
                            </td> -->
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm" value="{{ record.id }}" onClick="editable('#editRow{{ record.id }}')">
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
                    records:
                    [
                        {
                            id:545,
                            name:"Numan Naseer Nomi",
                            userName:"numan.naseer.nomi",
                            description:"sdf sd",
                            status:0
                        },
                        {
                            id:545,
                            name:"Numan Naseer Nomi",
                            userName:"numan.naseer.nomi",
                            description:"sdf sd",
                            status:0
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
                    fetch('https://jsonplaceholder.typicode.com/todos/1')
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