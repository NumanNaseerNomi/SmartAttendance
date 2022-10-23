<template>
    <TopNavbar></TopNavbar>
    <br/>
	<!-- <div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-4 mb-4">
				<SaveRecord></SaveRecord>
			</div>
			<div class="col-sm-12 col-md-8 mb-4">
				<ViewRecord></ViewRecord>
			</div>
		</div>
	</div> -->
	
	<LoginPage></LoginPage>
</template>

<script>
    import TopNavbar from "./components/TopNavbar.vue";
    import SaveRecord from "./components/SaveRecord.vue";
	import ViewRecord from "./components/ViewRecord.vue";
	import LoginPage from "./components/auth/LoginPage.vue";
    
    export default
    {
        components: {TopNavbar, SaveRecord, ViewRecord, LoginPage}
    }
</script>