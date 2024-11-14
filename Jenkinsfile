pipeline {
    agent any

    environment {
        DOCKER_IMAGE = 'my-laravel-app'
    }

    stages {
        stage('Clone Repository') {
            steps {
                git 'https://github.com/rezadika11/sig-parkir' 
            }
        }
        
        stage('Build Docker Image') {
            steps {
                script {
                    docker.build("${DOCKER_IMAGE}", ".")
                }
            }
        }
        
        stage('Run Tests') {
            steps {
                script {
                    
                    docker.image("${DOCKER_IMAGE}").inside {
                        sh 'vendor/bin/phpunit'
                    }
                }
            }
        }
        
        stage('Deploy to Production') {
            steps {
                
                echo 'Deploying to production...'
            }
        }
    }

    post {
        always {
            
            cleanWs()
        }
    }
}
