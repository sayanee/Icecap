// Removes files.
module.exports = function (grunt) {
  grunt.registerMultiTask('rm', 'Removes specified files', function () {
    var fs = require('fs');
    var path = require('path');    
    var rimraf = require('rimraf');
    var data = this.data;

    grunt.log.subhead('Removing ' + this.target + '...');

    if (data.dir && fs.statSync(data.dir).isDirectory()) {
      rimraf.sync(data.dir);      
      grunt.log.ok('Directory removed: ' + data.dir)
    } else {
      grunt.file.expandFiles(data).forEach(function (src) {      
        if (!path.existsSync(src)) {
          return;
        }
        fs.unlinkSync(src);
        grunt.log.ok('File removed: ' + src);
      });
    }
  });
};