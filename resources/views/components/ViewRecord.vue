<template>
    <div class="card text-center shadow">
        <div class="card-header"><h5>Manage Attendance {Card/Device}s</h5></div>
        <div class="container-fluid">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-sm align-middle text-nowrap">
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
                        <!-- @foreach($result as $row)
                            <tr id="editRow{{ $row->id }}">
                                <td>{{ $row->id }}</td>
                                <td>
                                    <div>{{ $row->name }}</div>
                                    <div class="text-muted">{{ $row->userName }}</div>
                                </td>
                                <td>{{ $row->cardId . $row->deviceId}}</td>
                                <td>{{ $row->description }}</td>
                                <td>
                                    @if($row->isBlocked)
                                        <span class="text-danger">Blocked</span>
                                    @else
                                        <span class="text-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-sm" value="{{ $row->id }}" onClick="editable('#editRow{{ $row->id }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach -->
                    </tbody>
                </table>
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
                    record: {id:545, name:"Numan Naseer Nomi", itemId:"numan.naseer.nomi", description:"sdf sd", status:0},
                    // record: {}
                };
    
                return data;
            },
    
            methods:
            {
                saveRecord()
                {
                    // console.log(this.record);
                    this.record = {};
                    // fetch('https://jsonplaceholder.typicode.com/todos/1')
                    // .then(response => response.json())
                    // .then(json => console.log(json))
    
                    let payload =
                    {
                        title: "foo",
                        body: "bar",
                        userId: 1,
                    };
    
                    let apiRequestDetails =
                    {
                        method: "POST",
                        body: JSON.stringify(payload),
                        headers: {"Content-type": "application/json; charset=UTF-8"},
                    };
    
                    fetch("https://jsonplaceholder.typicode.com/posts", apiRequestDetails)
                    .then((response) => response.json())
                    .then((json) => console.log(json));
                }
            }
        }
    </script>