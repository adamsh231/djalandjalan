<template>
	<div class="row partners-thread">
		<div
			v-for="partner in partners"
			v-bind:key="partner.id"
			class="col-6 col-md-3 partners-thread-card"
		>
			<a v-bind:href="url+'/partner/'+partner.id">
				<div class="card card-partners">
					<div class="img-hover-zoom">
						<img v-bind:src="partner.dest_picture" class="card-img-top" alt="..." />
					</div>
					<div class="card-body">
						<a :href="url+'/profile/'+partner.user.id">
							<img :src="partner.user.picture" class="display-profil" alt="Avatar" />
						</a>
						<h5 class="card-title">{{ partner.dest_name }}</h5>
						<h6 class="card-title">{{ partner.user.name.split(' ')[0] }} / {{ partner.user.city }}</h6>
						<p class="card-text">
							Tgl:
							<span>{{ partner.start_date }} - {{ partner.end_date }}</span>
						</p>
						<p class="card-text">
							Titik Kumpul:
							<span>{{ partner.gather_point.substring(0,20) }}</span>
						</p>
						<p class="card-text" style="float: right;">
							Anggota:
							<span style="font-weight: bold">{{ partner.joined }}/{{ partner.required_person }}</span>
						</p>
					</div>
				</div>
			</a>
		</div>
		<div class="d-flex justify-content-center col-6 col-md-12 partners-thread-card">
			<div class="spinner-border" role="status" v-show="isLoad">
				<span class="sr-only">Loading...</span>
			</div>
			<div class="alert alert-warning" v-show="isError" role="alert">{{ errorMessage }}</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			partners: [],
			partners_data: [],
			url: window.location.origin,
			isLoad: false,
			isFetch: false,
			isError: false,
			errorMessage: ""
		};
	},
	created() {
		this.fetchPartner("/api/partner");
		this.scrolling();
	},
	methods: {
		fetchPartner(url) {
			this.isFetch = this.isLoad = true;
			axios
				.get(url)
				.then(response => {
					this.isFetch = this.isLoad = false;
					this.partners_data = response.data;
					var arr_concat = this.partners.concat(this.partners_data.data);
					this.partners = arr_concat;
				})
				.catch(error => {
					this.isError = true;
					this.isLoad = false;
					this.errorMessage = error;
				});
		},
		scrolling() {
			window.addEventListener("scroll", () => {
				const position =
					window.pageYOffset + document.documentElement.clientHeight;
				const max_position = document.documentElement.scrollHeight;
				const fetch_position = document.documentElement.scrollHeight * 0.8;
				if (
					position >= fetch_position &&
					this.partners_data.next_page_url &&
					!this.isFetch
				) {
					this.fetchPartner(this.partners_data.next_page_url);
				}
			});
		}
	}
};
</script>
