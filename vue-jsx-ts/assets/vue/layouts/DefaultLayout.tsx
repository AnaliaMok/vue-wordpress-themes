import { Vue, Component } from 'vue-property-decorator';

@Component
export default class DefaultLayout extends Vue {
	render(h:any){
		return (
			<main class="container mx-auto sm:py-8 lg:py-12">
				{this.$slots.default}
			</main>
		);
	}
}



