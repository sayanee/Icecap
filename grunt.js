module.exports = function(grunt) {

  grunt.loadNpmTasks('grunt-rm');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-compress');

  grunt.initConfig({


    copy: {
      dist: {
        files: {
          "publish/images/": "images/**",
          "publish/404.php": "404.php",
          "publish/archive.php": "archive.php",
          "publish/attachment.php": "attachment.php",
          "publish/author.php": "author.php",
          "publish/comments.php": "comments.php",
          "publish/category.php": "category.php",
          "publish/changelog.txt": "changelog.txt",
          "publish/fitvid.js": "fitvid.js",
          "publish/footer.php": "footer.php",
          "publish/functions.php": "functions.php",
          "publish/header.php": "header.php",
          "publish/index.php": "index.php",
          "publish/loop.php": "loop.php",
          "publish/onecolumn-page.php": "onecolumn-page.php",
          "publish/page.php": "page.php",
          "publish/screenshot.png": "screenshot.png",
          "publish/script.js": "script.js",
          "publish/search.php": "search.php",
          "publish/searchform.php": "searchform.php",
          "publish/sidebar-footer.php": "sidebar-footer.php",
          "publish/sidebar.php": "sidebar.php",
          "publish/single.php": "single.php",
          "publish/style.css": "style.css",
          "publish/tag.php": "tag.php"
        }
      }
    },

    compress: {
      zip: {
        files: {
          "icecap.1.5.7.zip": "publish/**"
        }
      }
    },

    rm: {
      publish: ['publish/**', '*.zip']
    }

  });

  grunt.registerTask('pub', 'rm copy compress');
  grunt.registerTask('default', 'rm');

};