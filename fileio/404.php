<?php

class Red_404_File extends Red_FileIO {
    function export( array $items ) {
        header( 'Content-type: text/xml; charset='.get_option( 'blog_charset' ), true );
        echo '<?xml version="1.0" encoding="'.get_option( 'blog_charset' ).'"?'.">\r\n";
        ?>
        <rss version="2.0"
             xmlns:content="http://purl.org/rss/1.0/modules/content/"
             xmlns:wfw="http://wellformedweb.org/CommentAPI/"
             xmlns:dc="http://purl.org/dc/elements/1.1/">
            <channel>
                <title>Redirection - <?php bloginfo_rss( 'name' ); ?></title>
                <link><?php esc_url( bloginfo_rss( 'url' ) ) ?></link>
                <description><?php esc_html( bloginfo_rss( 'description' ) ) ?></description>
                <pubDate><?php echo esc_html( mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ) ); ?></pubDate>
                <generator>
                    <?php echo esc_html( 'http://wordpress.org/?v=' ); ?>
                    <?php bloginfo_rss( 'version' ); ?>
                </generator>
                <language><?php echo esc_html( get_option( 'rss_language' ) ); ?></language>

                <?php foreach ( (array) $items as $item ) : ?>
                    <item>
                        <id><?php echo esc_html( $item->id ); ?></id>
                        <created><?php echo date( 'D, d M Y H:i:s +0000', $item->created ); ?></created>
                        <url><?php echo esc_html( $item->url ); ?></url>
                        <agent><?php echo esc_html( $item->agent ); ?></agent>
                        <referrer><?php echo esc_html( $item->referrer ); ?></referrer>
                        <ip><?php echo esc_html( $item->ip ); ?></ip>
                    </item>
                <?php endforeach; ?>
            </channel>
        </rss>
        <?php
    }

    function load( $group, $data, $filename = '' ) {
    }
}
