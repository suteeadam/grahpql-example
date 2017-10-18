<?php 
namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class UserType extends GraphQLType {

	protected $attributes = [
		'name' => 'User',
		'description' => 'A user'
	];
  
  /*
	 * Uncomment following line to make the type input object.
	 * http://graphql.org/learn/schema/#input-types
	 */
	// protected $inputObject = true;

	public function fields()
	{
		return [
			'id' => [
				'type' => Type::nonNull(Type::Int()),
				'description' => 'The id of the user'
			],
			'email' => [
				'type' => Type::string(),
				'description' => 'The email of user'
			],
			'name' => [
				'type' => Type::string(),
				'description' => 'The name of user'
			],
			'code' => [
				'type' => Type::string(),
				'description' => 'The user code of user'
			]
		];
	}

}