/**
 * Type declarations to match one-to-one with WordPress data items.
 * FUTURE TODO: Expand and/or breakup to cover custom post types.
 *
 * @author Analia Mok
 */


/**
 * Media Item
 */
export interface WPMedia {
	url?: string;
	alt?: string;
	title?: string;
}

/**
 * RichText Interface
 *
 * Commonly used for post titles, content and excerpts.
 */
export interface WPRichText {
	rendered: string;
}

/**
 * WordPress Author Interface
 */
export interface WPAuthor {
	name: string;
	link?: string;
}

/**
 * Standard WordPress Post & Page content type.
 */
export interface WPPost {
	title: RichText;
	link: string;
	content?: RichText;
	date: string;
	thumbnail?: Media;
	featured_media?: Media; // From WP REST API
	categories?: string[];
	tags?: string[];
}

