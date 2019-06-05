import Vue from 'vue';
import Component from 'vue-class-component';

@Component
export default class DateMixin extends Vue {
  /**
   * Helper method for retrieving full month name.
   *
   * @param {Number} month - Base 0 index of month number
   * @return string - full month name
   */
  getMonthName(month:number): string {
    const months = [
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'July',
      'August',
      'September',
      'October',
      'November',
      'December',
    ];

    return months[month];
  }

  /**
   * Formats UNIX timestamp
   *
   * @param timestamp - UNIX timestamp
   * @param String - formatted timestamp
   */
  getFormattedDate(timestamp:string):string {
    const date = new Date(timestamp);
    const dateString:string =
      this.getMonthName(date.getMonth()) +
      ' ' +
      date.getDate() +
      ', ' +
      date.getFullYear();

    return dateString;
  }
}
