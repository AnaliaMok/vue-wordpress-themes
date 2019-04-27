class PlaceholderList {

  baseUrl:string = window.location.origin;

  thumbnail: string = this.baseUrl + '/wp-content/themes/vue-classic/assets/img/placeholder.png';

  banner: string = this.baseUrl + '/wp-content/themes/vue-classic/assets/img/placeholder-1920_1080.png';
}

let Placeholders = new PlaceholderList();
export default Placeholders;