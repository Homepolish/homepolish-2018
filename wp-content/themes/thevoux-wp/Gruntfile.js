'use strict';
module.exports = function(grunt) {

    grunt.initConfig({

        // let us know if our JS is sound
        jshint: {
            options: {
                "bitwise": true,
                "browser": true,
                "curly": true,
                "eqeqeq": true,
                "eqnull": true,
                "es5": true,
                "esnext": true,
                "immed": true,
                "jquery": true,
                "latedef": true,
                "newcap": true,
                "noarg": true,
                "node": true,
                "strict": false,
                "undef": true,
                "-W099": true,
                "globals": {
                    "jQuery": true,
                    "alert": true,
                    "google": true,
                    "InfoBox": true,
                    "themeajax": true,
                    "ajaxurl": true,
                    "smoothScroll": true,
					"TimelineLite": true,
					"TimelineMax": true,
					"TweenLite": true,
					"TweenMax": true,
					"Quart": true,
					"Back": true,
					"_": true,
					"skrollr": true,
					"IScroll": true
                }
            },
            all: [
                'Gruntfile.js',
                'assets-2018/js/plugins/app.js',
                'assets-2018/js/plugins/hmpl-auth.js',
                'assets-2018/js/plugins/admin-meta.js'
            ]
        },

        // concatenation and minification all in one
        uglify: {
            dist: {
                options: {
                    beautify: false,
                    mangle: false
                },
                files: {
					'assets-2018/js/admin-meta.min.js': [
						'assets-2018/js/plugins/admin-meta.js'
					],
					'assets-2018/js/vendor.min.js': [
						'assets-2018/js/vendor/*.js'
					]
                }
            },
            app: {
				options: {
					beautify: false,
					mangle: false
				},
				files: {
					'assets-2018/js/app.min.js': [
						'assets-2018/js/plugins/app.js',
                        'assets-2018/js/plugins/hmpl-auth.js'
					]
				}
            }
        },

		concat: {
			options: {
				separator: ';',
				stripBanners: true
			},
			dist: {
				src: 'assets-2018/js/vendor/*.js',
				dest: 'assets-2018/js/vendor.min.js',
			},
		},

        // style (Sass) compilation via Compass
        compass: {
            dist: {
                options: {
                    sassDir: 'assets-2018/sass',
                    cssDir: 'assets-2018/css',
					noLineComments: true
                }
            },
			dev: {
				options: {
					sassDir: 'assets-2018/sass',
					cssDir: 'assets-2018/css',
					noLineComments: true
				}
			}
        },

        // watch our project for changes
        watch: {
            compass: {
                files: [
                    'assets-2018/sass/**/*'
                ],
                tasks: ['compass']
            },
            js: {
                files: [
                    '<%= jshint.all %>'
                ],
                tasks: ['uglify']
            }
        }
    });

    // load tasks
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');

    // register task
    grunt.registerTask('default', [
        'jshint',
        'compass:dev',
        'concat',
        'watch'
    ]);

    grunt.registerTask('release', [
        'jshint',
        'compass:dev',
        'uglify',
        'watch'
    ]);

    grunt.registerTask('compile', [
        'jshint',
        'compass:dev',
        'uglify'
    ]);
};