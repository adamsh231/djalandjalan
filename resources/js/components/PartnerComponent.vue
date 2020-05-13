<template>
	<div class="container page-content">
		<div class="search mb-2">
			<div class="row align-items-center">
				<div class="col">
					<input
						autocomplete="off"
						type="search"
						class="form-control pull-left"
						placeholder="Cari Destinasi Keinginanmu"
						v-model="search"
					/>
				</div>
				<div class="col-auto text-right">
					<button class="btn btn-core" @click="fetchPartner(url+'/api/partner?'+filter, true)">
						<i class="fa fa-search"></i> Cari
					</button>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-2">
				<div class="filter mt-4">
					<div class="kategori-filter">
						<b>Tanggal</b>
						<input
							autocomplete="off"
							id="filter_tanggal"
							type="text"
							class="form-control"
							placeholder="Pilih Tanggal"
						/>
					</div>
				</div>

				<div class="filter">
					<div class="kategori-filter">
						<b>Anggota</b>
						<select
							class="form-control"
							v-model="person"
							@change="fetchPartner(url+'/api/partner?'+filter, true)"
						>
							<option></option>
							<option value="1">Kurang dari 3</option>
							<option value="2">3 sampai 6</option>
							<option value="3">Lebih dari 6</option>
						</select>
					</div>
				</div>

				<div class="filter">
					<div class="kategori-filter">
						<b>Kategori</b>
						<select
							class="form-control"
							v-model="category"
							@change="fetchPartner(url+'/api/partner?'+filter, true)"
						>
							<option></option>
							<option value="gunung">Gunung</option>
							<option value="pantai">Pantai</option>
							<option value="air terjun">Air Terjun</option>
							<option value="road trip">Road Trip</option>
						</select>
					</div>
				</div>

				<div class="filter">
					<div class="kategori-filter">
						<b>Urutkan Berdasarkan</b>
						<select
							class="form-control"
							v-model="orderby"
							@change="fetchPartner(url+'/api/partner?'+filter, true)"
						>
							<option></option>
							<option value="start_date">Tanggal</option>
							<option value="required_person">Jumlah Anggota</option>
						</select>
					</div>
				</div>
			</div>

			<div class="col-10">
				<div class="mt-4"></div>

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
			</div>
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
			search: window.search,
			start_date: "",
			end_date: "",
			person: "",
			category: "",
			orderby: "",
			isLoad: false,
			isFetch: false,
			isError: false,
			errorMessage: ""
		};
	},
	created() {
		this.fetchPartner("/api/partner?search="+this.search);
        this.scrolling();
	},
	methods: {
		fetchPartner(url, clear = false) {
            window.history.replaceState('', '', window.location.origin+'/partner?search='+this.search); // or using push state
			this.isFetch = this.isLoad = true;
			axios
				.get(url)
				.then(response => {
					this.isFetch = this.isLoad = false;
					this.partners_data = response.data;
					if (clear) {
						this.partners = response.data.data;
					} else {
						var arr_concat = this.partners.concat(this.partners_data.data);
						this.partners = arr_concat;
					}
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
					this.fetchPartner(
						this.partners_data.next_page_url + "&" + this.filter
					);
				}
			});
		}
	},
	mounted() {
        $('#beforeCreate').hide();
		const vm = this;
		$(function() {
			$("#filter_tanggal").daterangepicker({
				autoUpdateInput: false,
				locale: {
					cancelLabel: "Clear"
				}
			});

			$("#filter_tanggal").on("apply.daterangepicker", function(ev, picker) {
				vm.start_date = picker.startDate.format("YYYY-MM-DD");
				vm.end_date = picker.endDate.format("YYYY-MM-DD");
				$(this).val(
					picker.startDate.format("DD/MM/YYYY") +
						" - " +
						picker.endDate.format("DD/MM/YYYY")
				);
				vm.fetchPartner(vm.url + "/api/partner?" + vm.filter, true);
			});

			$("#filter_tanggal").on("cancel.daterangepicker", function(ev, picker) {
				vm.start_date = "";
				vm.end_date = "";
                $(this).val("");
                vm.fetchPartner(vm.url + "/api/partner?" + vm.filter, true);
			});
		});
	},
	computed: {
		filter() {
			let filtered =
				"search=" +
				this.search +
				"&start_date=" +
				this.start_date +
				"&end_date=" +
				this.end_date +
				"&person=" +
				this.person +
				"&category=" +
				this.category +
				"&orderby=" +
				this.orderby;
			return filtered;
		}
	}
};
</script>
