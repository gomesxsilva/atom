'use strict';

angular.module('momaApp')
  .controller('DashboardCtrl', function ($scope, $http, atomGlobals) {

    $scope.atomGlobals = atomGlobals;

    $scope.selectAips = [
      { id: 0, name: 'Douglas Gordon', statusNo: 'unclassified', statusYes: 'classified', randomArrayItem: 'lemon' },
      { id: 1, name: 'Rush King', statusNo: 'unclassified', statusYes: 'classified', randomArrayItem: 'apple' },
      { id: 2, name: 'Jeremiah Jones', statusNo: 'unclassified', statusYes: 'classified', randomArrayItem: 'pear' },
      { id: 3, name: 'Shana Lang', statusNo: 'unclassified', statusYes: 'classified', randomArrayItem: 'guava' },
      { id: 4, name: 'Harding Yates', statusNo: 'unclassified', statusYes: 'classified', randomArrayItem: 'pineapple' },
      { id: 5, name: 'Ola Atkinson', statusNo: 'unclassified', statusYes: 'classified', randomArrayItem: 'cherry' },
      { id: 6, name: 'Neva Herring', statusNo: 'unclassified', statusYes: 'classified', randomArrayItem: 'olive' },
      { id: 7, name: 'Judy Hopper', statusNo: 'unclassified', statusYes: 'classified', randomArrayItem: 'asparagus' },
      { id: 8, name: 'Adolphus Arugula', statusNo: 'unclassified', statusYes: 'classified', randomArrayItem: 'train wreck' }
    ];
});