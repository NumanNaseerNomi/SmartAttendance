<template>
<div class="card bg-light text-dark shadow">
	<div class="card-header text-center"><h5>Add New {User/Device}</h5></div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label">Serial Number</label>
                    <input class="form-control form-control-sm" v-model="record.isAdmin" readonly required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Name *</label>
                    <input class="form-control form-control-sm" v-model="record.name" required />
                </div>
                <div class="mb-3">
                    <!-- <label for="{{ strtolower($idType) }}Id" class="form-label">{{ $idType }} ID</label>
                    <input type="text" class="form-control form-control-sm" id="{{ strtolower($idType) }}Id" name="{{ strtolower($idType) }}Id" required> -->
                    <label class="form-label">{Card/Device} ID *</label>
                    <input class="form-control form-control-sm" v-model="record.itemId" required />
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control form-control-sm" id="description" name="description" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select form-select-sm" id="status" name="isBlocked" required>
                        <option disabled selected></option>
                        <option value="0">Active</option>
                        <option value="1">Block</option>
                    </select>
                </div>
                <div class="row">
                    <div class="d-grid gap-2 col-6">
                        <button type="reset" class="btn btn-outline-primary btn-sm">Reset</button>
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
                record: {id:545, name:"Numan Naseer Nomi", itemId:"numan.naseer.nomi", isAdmin:1},
                // record: null
            };

            return data;
        }
    }
</script>