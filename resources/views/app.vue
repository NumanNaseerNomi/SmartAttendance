<template>
    <TopNavbar></TopNavbar>
    <br/>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-4 mb-4">
			<SaveRecord></SaveRecord>
		</div>
		<div class="col-sm-12 col-md-8 mb-4">
			
		</div>
	</div>
</div>
</template>

<script>
    import TopNavbar from "./components/TopNavbar.vue";
    import SaveRecord from "./components/SaveRecord.vue";
    
    export default
    {
        components:
        {
            TopNavbar, SaveRecord
        }
    }
</script>